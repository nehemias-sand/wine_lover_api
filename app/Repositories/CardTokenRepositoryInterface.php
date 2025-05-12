<?php

namespace App\Repositories;

interface CardTokenRepositoryInterface {
    public function indexClient($clientId);
    public function show($id);
    public function store(array $data);
    public function update($id, $data);
    public function delete($id);
}