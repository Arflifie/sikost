<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    protected $table = 'pembayaran';
    protected $primaryKey = 'id_pembayaran';

    protected $fillable = [
        'booking_id',
        'total_pembayaran',
        'status',
        'jenis_pembayaran',
        'metode_pembayaran',
        'midtrans_code',
        'tenggat_penyewaan',
    ];
}
