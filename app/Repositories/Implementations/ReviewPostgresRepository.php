<?php

namespace App\Repositories\Implementations;

use App\Models\Review;
use App\Repositories\ReviewRepositoryInterface;

class ReviewPostgresRepository implements ReviewRepositoryInterface
{
    public function index(array $pagination, array $filter)
    {
        $reviews = Review::query()->with([
            'user',
            'comments',
        ]);

        if (isset($filter['comments_available'])) {
            $reviews->where('comments_available', '=', $filter['comments_available']);
        }

        if ($pagination['paginate'] === 'true') {
            return $reviews->paginate($pagination['per_page']);
        }
    }

    public function show($id)
    {
        return Review::with([
            'user',
            'comments',
        ])->find($id);
    }

    public function store(array $data)
    {
        return Review::create($data)->load([
            'user',
            'comments',
        ]);
    }

    public function update($id, $data)
    {
        $review = $this->show($id);
        if (!$review) return null;

        $review->update($data);

        return $review;
    }

    public function delete($id)
    {
        $review = $this->show($id);
        if (!$review) return null;

        $review->delete();
        return $review;
    }
}
