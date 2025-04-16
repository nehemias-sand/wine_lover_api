<?php

namespace App\Repositories\Implementations;

use App\Models\Comment;
use App\Repositories\CommentRepositoryInterface;

class CommentPostgresRepository implements CommentRepositoryInterface
{

    public function index(array $pagination, array $filter)
    {
        $comments = Comment::query();
        if (isset($filter['id'])) {
            $comments->where('id', 'like', '%' . $filter['id'] . '%');
        }

        if ($pagination['paginate'] === 'true') {
            return $comments->paginate($pagination['per_page']);
        }
    }

    public function show($id)
    {
        return Comment::find($id);
    }

    public function store(array $data)
    {
        return Comment::create($data);
    }

    public function update($id, $data)
    {
        $comment = Comment::find($id);
        if (!$comment) return null;

        $comment->update($data);

        return $comment;
    }

    public function delete($id)
    {
        $comment = Comment::find($id);
        if (!$comment) return null;

        $comment->delete();
        return $comment;
    }
}
