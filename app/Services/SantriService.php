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

    public function store(array $data){
        return $this->repo->create($data);
    }
}