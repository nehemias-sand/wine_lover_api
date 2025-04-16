<?php

namespace App\Services;

use App\Repositories\CommentRepositoryInterface;

class CommentService
{

    public function __construct(private CommentRepositoryInterface $commentRepositoryInterface) {}

    public function index(array $pagination, array $filter)
    {
        return $this->commentRepositoryInterface->index($pagination, $filter);
    }

    public function store(array $data)
    {
        return $this->commentRepositoryInterface->store($data);
    }

    public function update(int $id, array $data) 
    {
        return $this->commentRepositoryInterface->update($id, $data);
    }

    public function delete(int $id){
        return $this->commentRepositoryInterface->delete($id);
    }
}
