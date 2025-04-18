<?php

namespace App\Services;

use App\Repositories\ProductPresentationRepositoryInterface;

class ProductPresentationService
{
    public function __construct(
        private ProductPresentationRepositoryInterface $productPresentationRepositoryInterface
    ) {}

    public function index(array $pagination, array $filter)
    {
        return $this->productPresentationRepositoryInterface->index($pagination, $filter);
    }

    public function show($ids)
    {
        return $this->productPresentationRepositoryInterface->show($ids);
    }

    public function store(array $data)
    {
        return $this->productPresentationRepositoryInterface->store($data);
    }

    public function update($ids, array $data)
    {
        return $this->productPresentationRepositoryInterface->update($ids, $data);
    }

    public function delete($ids)
    {
        return $this->productPresentationRepositoryInterface->delete($ids);
    }
}
