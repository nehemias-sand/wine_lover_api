<?php

namespace App\Repositories;

interface RepositoryInterface 
{
    public function index(array $pagination, array $filter);
    public function show($id);    
    public function store(array $data);
    public function update($id, $data);
    public function delete($id);
}
