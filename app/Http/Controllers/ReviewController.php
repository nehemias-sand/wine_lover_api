<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponseClass;
use App\Http\Requests\Review\CreateReviewRequest;
use App\Http\Requests\Review\UpdateReviewRequest;
use App\Http\Resources\ReviewResource;
use App\Services\ReviewService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ReviewController extends Controller
{
    public function __construct(private ReviewService $reviewService) {}

    public function index(Request $request)
    {
        $user = auth()->user();
        if ($user->client && $user->client->currentMembershipPlan === null) {
            throw new HttpException(403);
        }

        $pagination = array_merge([
            'paginate' => 'true',
            'per_page' => 10
        ], $request->only(['paginate', 'per_page']));

        $filter = $request->only(['comments_available']);

        $data = $this->reviewService->index($pagination, $filter);

        return ApiResponseClass::sendResponse(ReviewResource::collection($data));
    }

    public function changeState($id)
    {
        $review = $this->reviewService->show($id);
        if (!$review) return ApiResponseClass::sendResponse(null, "review con ID: $id no encontrada", 404);

        $data = [
            'comments_available' => !$review->comments_available
        ];

        $updatedReviewComment = $this->reviewService->update($id, $data);

        return ApiResponseClass::sendResponse(new ReviewResource($updatedReviewComment));
    }


    public function store(CreateReviewRequest $request)
    {
        $user = auth()->user();

        $title = $request->title;
        $content = $request->content;
        $cover_image = $request->file('cover_image');

        $data = [
            'title' => $title,
            'content' => $content,
            'cover_image' => $cover_image,
            'user_id' => $user->id,
        ];

        DB::beginTransaction();

        try {
            $review = $this->reviewService->store($data);

            DB::commit();
            return ApiResponseClass::sendResponse(new ReviewResource($review), null, 201);
        } catch (\Exception $ex) {
            return ApiResponseClass::rollback($ex);
        }
    }

    public function update(int $id, UpdateReviewRequest $request)
    {
        $data = $request->only([
            'title',
            'content',
            'cover_image',
        ]);

        $review = $this->reviewService->update($id, $data);
        if (!$review) return ApiResponseClass::sendResponse(null, "ID no encontrada", 404);

        return ApiResponseClass::sendResponse(new ReviewResource($review));
    }

    public function delete($id)
    {
        $review = $this->reviewService->delete($id);
        if (!$review) return ApiResponseClass::sendResponse(null, "ID no encontrada", 404);

        return ApiResponseClass::sendResponse(new ReviewResource($review));
    }
}
