<?php

namespace App\Http\Controllers;

use App\Models\Tagihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TagihanController extends Controller
{
    /**
     * PENYEWA – Membuat / melanjutkan pembayaran
     * POST /tagihan
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        if ($user->role !== 'penyewa') {
            return abort(403, 'Akses hanya untuk Penyewa.');
        }

        $validated = $request->validate([
            'booking_id' => 'required|integer',
            'total_pembayaran' => 'required|numeric|min:0',
            'metode_pembayaran' => 'nullable|string',
            'jenis_pembayaran' => 'nullable|string',
        ]);

        $validated['status'] = 'pending';

        $tagihan = Tagihan::create($validated);

        return response()->json([
            'message' => 'Tagihan berhasil dibuat.',
            'data' => $tagihan
        ], 201);
    }

    /**
     * PENYEWA – History tagihan
     * GET /tagihan
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->role !== 'penyewa') {
            return abort(403, 'Akses hanya untuk Penyewa.');
        }

        $tagihan = Tagihan::where('booking_id', $user->profile_id)
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json($tagihan);
    }

    /**
     * ADMIN – Laporan semua tagihan
     * GET /admin/tagihan
     */
    public function adminIndex()
    {
        $user = Auth::user();

        if ($user->role !== 'admin') {
            return abort(403, 'Akses hanya untuk Admin.');
        }

        $tagihan = Tagihan::orderBy('created_at', 'desc')->get();

        return response()->json($tagihan);
    }

    /**
     * PEMILIK – Laporan tagihan berdasarkan kos miliknya
     * GET /pemilik/tagihan
     */
    public function pemilikIndex()
    {
        $user = Auth::user();

        if ($user->role !== 'pemilik') {
            return abort(403, 'Akses hanya untuk Pemilik.');
        }

        // Catatan: Jika tidak ada kolom pemilik di Supabase,
        // maka ini nanti bisa disesuaikan.
        // Sekarang dibuat basic tanpa filter.
        $tagihan = Tagihan::orderBy('created_at', 'desc')->get();

        return response()->json($tagihan);
    }
}
