<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Guru extends Authenticatable
{
    use HasFactory;

    protected $guard = "guru";

    protected $fillable = [
        'name',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'guru_mapel',
        'alamat',
        'nomor_telepon',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
