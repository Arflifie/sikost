<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    protected $fillable = [
        'penyewa_id',
        'booking_id',
        'jumlah_tagihan',
        'tanggal_tagihan',
        'status',
        'bukti_pembayaran'
    ];

    public function penyewa()
    {
        return $this->belongsTo(User::class, 'penyewa_id');
    }
}
