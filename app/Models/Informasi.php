<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informasi extends Model
{
    use HasFactory;

    protected $guard = "informasis";

    protected $fillable = [
        'judul',
        'detail_info',
        'foto',
    ];
}
