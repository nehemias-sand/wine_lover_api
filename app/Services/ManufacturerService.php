<?php

namespace App\Services;

use App\Repositories\ManufacturerRepositoryInterface;

class ManufacturerService
{
    public function __construct(private ManufacturerRepositoryInterface $manufacturerRepositoryInterface)
    {
        
    }

    public function index(array $pagination, array $filter)
    {
        return $this->manufacturerRepositoryInterface->index($pagination, $filter);
    }

    public function show($id)
    {
        return $this->manufacturerRepositoryInterface->show($id);
    }

    public function store(array $data)
    {
        return $this->manufacturerRepositoryInterface->store($data);
    }

    public function update(int $id, array $data)
    {
        return $this->manufacturerRepositoryInterface->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->manufacturerRepositoryInterface->delete($id);
    }
}