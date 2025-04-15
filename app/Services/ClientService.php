<?php

namespace App\Services;

use App\Repositories\AddressRepositoryInterface;
use App\Repositories\ClientRepositoryInterface;

class ClientService
{
    public function __construct(
        private ClientRepositoryInterface $clientRepositoryInterface,
        private AddressRepositoryInterface $addressRepositoryInterface
    ) {}

    public function index(array $pagination, array $filter)
    {
        return $this->clientRepositoryInterface->index($pagination, $filter);
    }

    public function store(array $dataClient, array $dataAddress)
    {
        $client = $this->clientRepositoryInterface->store($dataClient);

        $dataAddress['client_id'] = $client->id;

        $this->addressRepositoryInterface->store($dataAddress);

        return $client;
    }

    public function update(int $id, array $data)
    {
        return $this->clientRepositoryInterface->update($id, $data);
    }

}
