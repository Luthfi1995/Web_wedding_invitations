<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gifts extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'deskripsi',
        'nama_bank',
        'gambar',
        'no_rek',
    ];
}
