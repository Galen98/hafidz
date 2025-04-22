<?php

namespace App\Repositories;

use App\Models\Santri;

class SantriRepository {

    public function all() {
        return Santri::all();
    }

    public function create(array $data) {
        return Santri::create($data);
    }

    public function find($id) {
        return Santri::findOrFail($id);
    }

    public function update($id, array $data) {
        $santri = Santri::findOrFail($id);
        $santri->update($data);
        return $santri;
    }

    public function delete($id) {
        return Santri::destroy($id);
    }
}