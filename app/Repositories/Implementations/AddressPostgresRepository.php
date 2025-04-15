<?php

namespace App\Repositories\Implementations;

use App\Models\Address;
use App\Repositories\AddressRepositoryInterface;

class AddressPostgresRepository implements AddressRepositoryInterface
{

    public function index(array $pagination, array $filter) {}

    public function show($id)
    {
        $address = Address::find($id);

        if (!$address) return null;

        return $address;
    }

    public function store(array $data)
    {
        return Address::create($data);
    }

    public function update($id, $data)
    {
        $address = Address::find($id);

        if (!$address) return null;

        $address->update($data);

        return $address;
    }

    public function delete($id)
    {
        $address = $this->show($id);

        if (!$address) return null;

        $address->delete();

        return $address;
    }
}
