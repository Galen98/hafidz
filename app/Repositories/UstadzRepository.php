<?php
namespace App\Repositories;

use App\Models\User;
use App\Models\Santri;
use App\Models\DaftarKelompok;

class UstadzRepository {
    public function storeSantri(){

    }

    public function allSantri(){
        // $userSantri = User::with('santri')->find($id);
        // return $userSantri->santri;
        return User::santri();
    }

    public function updateSantri($id){

    }

    public function deleteSantri($id){

    }
}