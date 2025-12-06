<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Kamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Membuat booking baru
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'kamar_id'           => 'required|exists:kamar,id_kamar',
            'tanggal_check_in'   => 'required|date|after_or_equal:today',
            'tanggal_check_out'  => 'required|date|after:tanggal_check_in',
        ]);

        // Ambil kamar
        $kamar = Kamar::find($request->kamar_id);

        // Hitung total harga (harga kamar * jumlah hari)
        $jumlahHari = (strtotime($request->tanggal_check_out) - strtotime($request->tanggal_check_in)) / 86400;
        $totalHarga = $kamar->harga * $jumlahHari;

        // Buat batas booking otomatis (1 jam dari sekarang)
        $batasPembayaran = now()->addHour();

        // Simpan booking
        $booking = Booking::create([
            'user_id'            => Auth::id(),
            'kamar_id'           => $request->kamar_id,
            'status_booking'     => 'pending',
            'total_harga'        => $totalHarga,
            'tanggal_booking'    => now(),
            'batas_booking'      => $batasPembayaran,
            'tanggal_check_in'   => $request->tanggal_check_in,
            'tanggal_check_out'  => $request->tanggal_check_out,
            'tipe_pembayaran'    => null,
        ]);

    return response()->json([
        'status'  => 'success',
        'message' => 'Booking berhasil dibuat',
        'data'    => $booking
    ], 201);
}

/**
 * METHOD 2
 * GET /booking
 * Menampilkan semua booking milik user yang sedang login
 */
public function index()
{
    // Ambil ID user yang sedang login
    $userId = auth()->id();

    // Ambil seluruh booking milik user tersebut
    $bookings = Booking::with('kamar') // optional: ikut kirim data kamar
        ->where('user_id', $userId)
        ->orderBy('tanggal_booking', 'desc')
        ->get();

    return response()->json([
        'status' => 'success',
        'message' => 'Daftar booking Anda berhasil diambil',
        'data' => $bookings
    ]);
}

/**
 * METHOD 4
 * GET /booking/{id_booking}
 * Menampilkan detail satu booking milik user yang sedang login
 */
public function show($id_booking)
{
    $userId = auth()->id();

    // Cari booking berdasarkan id_booking + hanya milik user ini
    $booking = Booking::with('kamar')
        ->where('id_booking', $id_booking)
        ->where('user_id', $userId)
        ->first();

    if (!$booking) {
        return response()->json([
            'status'  => 'error',
            'message' => 'Booking tidak ditemukan atau bukan milik Anda'
        ], 404);
    }

    return response()->json([
        'status'  => 'success',
        'message' => 'Detail booking berhasil diambil',
        'data'    => $booking
    ]);
}
/*
     * METHOD 5
     * PATCH /booking/{id_booking}
     * Update status pembayaran atau status booking
     */
    public function update(Request $request, $id_booking)
    {
        // Validasi input yang boleh diubah
        $validated = $request->validate([
            'status_booking'  => 'required|string|in:pending,dp50,lunas,cancel',
            'tipe_pembayaran' => 'nullable|string'
        ]);

        // Ambil user login
        $userId = auth()->id();

        // Ambil booking dan pastikan milik user
        $booking = Booking::where('id_booking', $id_booking)
            ->where('user_id', $userId)
            ->first();

        if (!$booking) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Booking tidak ditemukan atau bukan milik Anda'
            ], 404);
        }

        // Update data booking
        $booking->update([
            'status_booking'  => $request->status_booking,
            'tipe_pembayaran' => $request->tipe_pembayaran
        ]);

        return response()->json([
            'status'  => 'success',
            'message' => 'Status booking berhasil diperbarui',
            'data'    => $booking
        ]);
    }
}
