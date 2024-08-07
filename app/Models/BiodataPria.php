<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiodataPria extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'ibu',
        'bapak',
        'foto',
        'deskripsi'
    ];
}
