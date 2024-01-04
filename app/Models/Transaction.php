<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function wisata()
    {
        return $this->belongsTo(Wisata::class, 'wisata_id');
    }

    protected $fillable = [
        'user_id',
        'wisata_id',
        'tanggal',
        'nama_lengkap',
        'nomor_handphone',
        'email',
        'ktp',
        'metode_pembayaran',
    ];
}
