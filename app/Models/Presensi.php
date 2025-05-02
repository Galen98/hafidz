<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    protected $table = 'presensi';
    protected $fillable = [
        'users_id',
        'santri_id'
    ];
}
