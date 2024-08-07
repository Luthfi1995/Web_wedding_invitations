<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_nama_pengantin_istri',
        'id_nama_pengantin_pria',
        'gambar',
        'deskripsi',
    ];

    public function infoIstri()
    {
        return $this->belongsTo(Info::class, 'id_nama_pengantin_istri');
    }

    public function infoPria()
    {
        return $this->belongsTo(Info::class, 'id_nama_pengantin_pria');
    }
}
