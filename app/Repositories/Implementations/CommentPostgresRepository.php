<?php

namespace App\Repositories\Implementations;

use App\Models\Comment;
use App\Repositories\CommentRepositoryInterface;

class CommentPostgresRepository implements CommentRepositoryInterface
{

    public function index(array $pagination, array $filter)
    {
        $comments = Comment::query()->with([
            'parent',
            'review',
            'user',
        ]);

        if (isset($filter['review_id'])) {
            $comments->where('review_id', '=', $filter['review_id']);
        }

        if ($pagination['paginate'] === 'true') {
            return $comments->paginate($pagination['per_page']);
        }
    }

    public function show($id)
    {
        return Comment::with([
            'parent',
            'review',
            'user',
        ])->find($id);
    }

    public function store(array $data)
    {
        return Comment::create($data)->load([
            'parent',
            'review',
            'user',
        ]);
    }

    public function update($id, $data)
    {
        $comment = $this->show($id);
        if (!$comment) return null;

        $comment->update($data);

        return $comment;
    }

    public function delete($id)
    {
        $comment = $this->show($id);
        if (!$comment) return null;

        $comment->delete();
        return $comment;
    }
}
