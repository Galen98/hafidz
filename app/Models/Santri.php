<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    protected $table = 'santri';
    
    protected $fillable = [
        'nama',
        'nis',
        'tgl_lahir',
        'no_hp_wali',
        'status',
        'angkatan'
    ];
}
