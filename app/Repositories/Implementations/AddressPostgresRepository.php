<?php

namespace App\Repositories\Implementations;

use App\Models\Address;
use App\Repositories\AddressRepositoryInterface;

class AddressPostgresRepository implements AddressRepositoryInterface
{

    public function indexClient($clientId)
    {
        return Address::query()
            ->with('district')
            ->where('client_id', '=', $clientId)
            ->get();
    }

    public function show($id)
    {
        $address = Address::with('district')->find($id);

        if (!$address) return null;

        return $address;
    }

    public function store(array $data)
    {
        return Address::create($data)->load('district');
    }

    public function update($id, $data)
    {
        $address = $this->show($id);

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
