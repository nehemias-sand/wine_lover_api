<?php

namespace App\Repositories\Implementations;

use App\Models\Presentation;
use App\Repositories\PresentationRepositoryInterface;

class PresentationPostgresRepository implements PresentationRepositoryInterface
{
    public function index(array $pagination, array $filter) {
        $presentations = Presentation::query();

        if (isset($filter['unit_measurement_id'])) {
            $presentations->where('unit_measurement_id', '=', $filter['unit_measurement_id']);
        }

        if ($pagination['paginate']  === 'true') {
            return $presentations->paginate($pagination['per_page']);
        }

        return $presentations->get();
    }

    public function show($id) {
        $presentation = Presentation::find($id);
        if (!$presentation) return null;

        return $presentation;
    }

    public function store(array $data) {
        return Presentation::create($data);
    }

    public function update($id, $data) {
        $presentation = $this->show($id);
        if (!$presentation) return null;

        $presentation->update($data);
        return $presentation; 
    }

    public function delete($id) {
        $presentation = $this->show($id);
        if (!$presentation) return null;

        $presentation->delete();
        return $presentation;
    }
}
