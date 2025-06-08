<?php

namespace App\Services;

use App\Repositories\CashbackHistoryRepositoryInterface;

class CashbackHistoryService
{
    public function __construct(private CashbackHistoryRepositoryInterface $cashbackHistoryRepositoryInterface) {}

    public function index(array $pagination, $clientId)
    {
        return $this->cashbackHistoryRepositoryInterface->index($pagination, $clientId);
    }
}
