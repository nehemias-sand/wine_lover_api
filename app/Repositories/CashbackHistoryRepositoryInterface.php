<?php

namespace App\Repositories;

interface CashbackHistoryRepositoryInterface
{
    public function index(array $pagination, $clientId);
    public function store(array $data);
}
