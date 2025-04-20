<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponseClass;
use App\Http\Requests\Comment\CreateCommentRequest;
use App\Http\Requests\Comment\UpdateCommentRequest;
use App\Http\Resources\CommentResource;
use App\Services\CommentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function __construct(private CommentService $commentService) {}

    public function index(Request $request, int $reviewId)
    {
        $pagination = array_merge([
            'paginate' => 'true',
            'per_page' => 10
        ], $request->only(['paginate', 'per_page']));

        $filter = ['review_id' => $reviewId];

        $data = $this->commentService->index($pagination, $filter);

        return ApiResponseClass::sendResponse(CommentResource::collection($data));
    }

    public function store(CreateCommentRequest $request)
    {
        $user = auth()->user();

        $content = $request->content;
        $parent_id = $request->parent_id;
        $review_id = $request->review_id;

        $data = [
            'content' => $content,
            'parent_id' => $parent_id,
            'review_id' => $review_id,
            'user_id' => $user->id
        ];

        DB::beginTransaction();

        try {
            $comment = $this->commentService->store($data);

            DB::commit();
            return ApiResponseClass::sendResponse(new CommentResource($comment), null, 201);
        } catch (\Exception $ex) {
            return ApiResponseClass::rollback($ex);
        }
    }

    public function update($id, UpdateCommentRequest $request)
    {
        $data = $request->only([
            'content',
            'parent_id',
            'review_id'
        ]);

        $comment = $this->commentService->update($id, $data);
        if (!$comment) return ApiResponseClass::sendResponse(null, "ID no encontrada", 404);

        return ApiResponseClass::sendResponse(new CommentResource($comment));
    }

    public function delete($id)
    {
        $comment = $this->commentService->delete($id);
        if (!$comment) return ApiResponseClass::sendResponse(null, "ID no encontrada", 404);

        return ApiResponseClass::sendResponse(new CommentResource($comment));
    }
}
