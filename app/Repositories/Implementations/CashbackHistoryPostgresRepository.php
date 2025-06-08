<?php

namespace App\Repositories\Implementations;

use App\Models\CashbackHistory;
use App\Repositories\CashbackHistoryRepositoryInterface;

class CashbackHistoryPostgresRepository implements CashbackHistoryRepositoryInterface
{
    public function index(array $pagination, $clientId)
    {
        $cashbackHistory = CashbackHistory::query()
            ->where('client_id', '=', $clientId)
            ->orderBy('created_at', 'desc');

        if ($pagination['paginate'] === 'true') {
            return $cashbackHistory->paginate($pagination['per_page']);
        }

        return $cashbackHistory->get();
    }

    public function store(array $data)
    {
        return CashbackHistory::create($data);
    }
}
