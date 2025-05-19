<?php

namespace App\Repositories\Implementations;

use App\Models\Manufacturer;
use App\Repositories\ManufacturerRepositoryInterface;

class ManufacturerPostgresRepository implements ManufacturerRepositoryInterface
{
    public function index(array $pagination, array $filter){

        $manufaturers = Manufacturer::query();
        if(isset($filter['name'])){
            $manufaturers->where('name', '=', $filter['name']);
        }

        if($pagination['paginate']==='true'){
            return $manufaturers->paginate($pagination['per_page']);
        }
    }


    public function show($id)
    {
        return Manufacturer::find($id);
    }

    public function store(array $data)
    {
        return Manufacturer::create($data);
    }

    public function update($id, $data)
    {
        $manufaturers =Manufacturer::find($id);
        if(!$manufaturers) return null;
        $manufaturers->update($data);

        return $manufaturers;
    }

    public function delete($id)
    {

        $manufaturers=Manufacturer::find($id);
        if(!$manufaturers) return null;

        $manufaturers->delete();
        return $manufaturers;

    }
}
