<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'booking';
    protected $primaryKey = 'id_booking';

    protected $fillable = [
        'user_id',
        'kamar_id',
        'status_booking',
        'total_harga',
        'tanggal_booking',
        'batas_booking',
        'tanggal_check_in',
        'tanggal_check_out',
        'tipe_pembayaran',
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi ke Kamar
    public function kamar()
    {
        return $this->belongsTo(Kamar::class, 'kamar_id', 'id_kamar');
    }
}
