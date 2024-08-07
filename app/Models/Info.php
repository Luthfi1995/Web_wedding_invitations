<?php

namespace App\Models;

use App\Models\Gallery;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Info extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'nama_pengantin_istri',
        'nama_pengantin_pria',
        'tanggal_pernikahan',
        'waktu_acara',
        'alamat',
        'deskripsi'
    ];
    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'id_nama_pengantin_istri', 'id_nama_pengantin_pria');
    }

}
