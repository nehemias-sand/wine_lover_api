<?php

namespace App\Repositories\Implementations;

use App\Models\Client;
use App\Repositories\ClientRepositoryInterface;

class ClientPostgreRepository implements ClientRepositoryInterface
{

    public function index(array $pagination, array $filter)
    {
        $clients = Client::query();

        if (isset($filter['identity_number'])) {
            $clients->where('identity_number', '=', $filter['identity_number']);
        }

        if (isset($filter['names'])) {
            $clients->where(function ($query) use ($filter) {
                $query->whereRaw(
                    "CONCAT_WS(' ',
                        COALESCE(NULLIF(names, ''), ''),
                        COALESCE(NULLIF(surnames, ''), NULL),
                ) ILIKE ?",
                    ["%{$filter['names']}%"]
                );
            });
        }

        if ($pagination['paginate'] === 'true') {
            return $clients->paginate($pagination['per_page']);
        }

        return $clients->get();
    }

    public function show($id)
    {
        $client = Client::find($id);

        if (!$client) return null;

        return $client;
    }

    public function store(array $data)
    {
        return Client::create($data);
    }

    public function update($id, $data)
    {
        $client = Client::find($id);

        if (!$client) return null;

        $client->update($data);

        return $client;
    }

    public function delete($id)
    {
        $client = $this->show($id);

        if (!$client) return null;

        $client->delete();

        return $client;
    }
}
