<?php

namespace App\Repositories\Implementations;

use App\Models\CardToken;
use App\Repositories\CardTokenRepositoryInterface;

class CardTokenPostgresRepository implements CardTokenRepositoryInterface
{
    public function indexClient($clientId)
    {
        return CardToken::query()->where('client_id', '=', $clientId)->get();
    }

    public function show($id)
    {
        $cardToken = CardToken::find($id);
        if (!$cardToken) return null;

        return $cardToken;
    }

    public function store(array $data)
    {
        return CardToken::create($data);
    }

    public function update($id, $data)
    {
        $cardToken = $this->show($id);
        if (!$cardToken) return null;

        $cardToken->update($data);

        return $order;
    }

    
    public function delete($id)
    {
        $cardToken = $this->show($id);
        if (!$cardToken) return null;

        $cardToken->delete();

        return $cardToken;
    }
}
