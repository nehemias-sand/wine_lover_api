<?php

namespace App\Repositories\Implementations;

use App\Models\Membership;
use App\Repositories\MembershipRepositoryInterface;

class MembershipPostgresRepository implements MembershipRepositoryInterface
{
    public function index()
    {
        return Membership::all();
    }

    public function show($id)
    {
        return Membership::find($id);
    }
}
