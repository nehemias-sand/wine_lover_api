<?php

namespace App\Services;

use App\Repositories\AddressRepositoryInterface;

class AddressService
{
    public function __construct(
        private AddressRepositoryInterface $addressRepositoryInterface
    ) {}

    public function store(array $data)
    {
        return $this->addressRepositoryInterface->store($data);
    }

    public function update(int $id, array $data)
    {
        return $this->addressRepositoryInterface->update($id, $data);
    }
}
