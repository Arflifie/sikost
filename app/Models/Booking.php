<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

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

    /**
     * Relasi: Booking milik satu User (Penyewa)
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Relasi: Booking memilih satu Kamar
     */
    public function kamar()
    {
        return $this->belongsTo(Kamar::class, 'kamar_id', 'id_kamar');
    }

    /**
     * Relasi: Booking bisa punya banyak Pembayaran (DP + Pelunasan)
     */
    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'booking_id', 'id_booking');
    }
}