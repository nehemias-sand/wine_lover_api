<?php

namespace App\Repositories\Implementations;

use App\Models\CashbackHistory;
use App\Repositories\CashbackHistoryRepositoryInterface;

class CashbackHistoryPostgresRepository implements CashbackHistoryRepositoryInterface
{
    public function store(array $data)
    {
        return CashbackHistory::create($data);
    }
}
