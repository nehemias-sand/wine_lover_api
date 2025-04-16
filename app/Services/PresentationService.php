<?php

namespace App\Services;

use App\Models\Presentation;
use App\Repositories\PresentationRepositoryInterface;

class PresentationService
{
    public function __construct(
        private PresentationRepositoryInterface $presentationRepositoryInterface
    ) {} 

    public function index(array $pagination, array $filter) {
        return $this->presentationRepositoryInterface->index($pagination, $filter);
    }

    public function show($id) {
        return $this->presentationRepositoryInterface->show($id);
    }

    public function store($data) {
        return Presentation::create($data);
    }

    public function update($id, array $data) {
        return $this->presentationRepositoryInterface->update($id, $data);
    }

    public function delete($id) {
        return $this->presentationRepositoryInterface->delete($id);
    }
}
