<?php

namespace App\Services;

use App\Models\Review;
use App\Repositories\ReviewRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class ReviewService
{

    public function __construct(private ReviewRepositoryInterface $reviewRepositoryInterface) {}

    public function index(array $pagination, array $filter)
    {
        return $this->reviewRepositoryInterface->index($pagination, $filter);
    }

    public function store(array $data)
    {
        $image = $data['cover_image'];

        $timestamp = time();
        $customName = "$timestamp.{$image->extension()}";

        $path = $image->storeAs('images/reviews', $customName, 'public');
        $data['cover_image'] = $path;

        return $this->reviewRepositoryInterface->store($data);
    }

    public function update(int $id, array $data)
    {
        $review = $this->reviewRepositoryInterface->show($id);

        if (!$review) {
            return null;
        }

        if (isset($data['cover_image'])) {
            $image = $data['cover_image'];
            $timestamp = time();
            $customName = "$timestamp.{$image->extension()}";

            $path = $image->storeAs('images/reviews', $customName, 'public');

            $data['cover_image'] = $path;

            if (Storage::disk('public')->exists($review->cover_image)) {
                Storage::disk('public')->delete($review->cover_image);
            }
            
        } else {
            unset($data['cover_image']);
        }

        $review->update($data);
        
        return $review;
    }

    public function delete(int $id)
    {
        return $this->reviewRepositoryInterface->delete($id);
    }
}
