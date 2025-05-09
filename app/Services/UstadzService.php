<?php
namespace App\Services;

use App\Repositories\UstadzRepository;

class UstadzService
{ 
    protected $repo;

    public function __construct(UstadzRepository $repo) {
        $this->repo = $repo;
    }

    public function getSantri(){
        return $this->repo->allSantri();
    }
}