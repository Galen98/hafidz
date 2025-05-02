<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DaftarKelompok extends Model
{
    protected $table = 'daftar_kelompok';
    protected $fillable = [
        'users_id',
        'santri_id'
    ];

    public function santri() {
        return $this->belongsTo(Santri::class, 'santri_id');
    }

    public function users() {
        return $this->belongsTo(User::class, 'users_id');
    }
}
