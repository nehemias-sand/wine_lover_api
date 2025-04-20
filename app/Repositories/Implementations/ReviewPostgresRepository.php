<?php

namespace App\Repositories\Implementations;

use App\Models\Review;
use App\Repositories\ReviewRepositoryInterface;

class ReviewPostgresRepository implements ReviewRepositoryInterface
{
    public function index(array $pagination, array $filter)
    {
        $reviews = Review::query();
        if (isset($filter['comments_available'])) {
            $reviews->where('comments_available', '=', $filter['comments_available']);
        }

        if ($pagination['paginate'] === 'true') {
            return $reviews->paginate($pagination['per_page']);
        }
    }

    public function show($id)
    {
        return Review::find($id);
    }

    public function store(array $data)
    {
        return Review::create($data);
    }

    public function update($id, $data)
    {
        $review = Review::find($id);
        if (!$review) return null;

        $review->update($data);

        return $review;
    }

    public function delete($id)
    {
        $review = Review::find($id);
        if (!$review) return null;

        $review->delete();
        return $review;
    }
}
