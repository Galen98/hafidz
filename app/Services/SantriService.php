<?php
namespace App\Services;

use App\Repositories\SantriRepository;

class SantriService
{
    protected $repo; 

    public function __construct(SantriRepository $repo)
    {
        $this->repo = $repo;
    }

    public function getAll() {
        return $this->repo->all();
    }

    public function getAllPaginate($perPage) {
        return $this->repo->allPaginated($perPage);
    }

    public function store(array $data){
        $data['status'] = 1;
        return $this->repo->create($data);
    }

    public function getById($id) {
        return $this->repo->find($id);
    }

    public function destroy($id) {
        return $this->repo->delete($id);
    }

    public function updates($id, array $data) {
        return $this->repo->update($id, $data);
    }
}