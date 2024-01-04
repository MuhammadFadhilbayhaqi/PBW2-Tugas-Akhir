<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    use HasFactory;

    protected $table = 'wisata';

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    protected $fillable = [
        'user_id',
        'nama',
        'noHp',
        'alamatEmail',
        'alamatLengkap',
        'detail',
        'kota',
        'provinsi',
        'kecamatan',
        'harga',
        'jadwal',
        'jumlahTiket',
        'informasi',
        'syarat',
        'image',
    ];

}
