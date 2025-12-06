<?php

namespace App\Http\Controllers\Penyewa;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use App\Models\Booking;
use App\Models\Kamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Notification;

class PembayaranController extends Controller
{

    public function __construct()
    {
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');
    }

    /**
     * GET /pembayaran
     * Actor: Penyewa
     * Desc: Menampilkan riwayat pembayaran milik user yang login.
     */
    public function index()
    {
        $userId = Auth::id();
        $pembayaran = Pembayaran::whereHas('booking', function($query) use ($userId) {
            $query->where('user_id', $userId);
        })->orderBy('created_at', 'desc')->get();

        return view('pembayaran.index', compact('pembayaran'));
    }

    /**
     * POST /pembayaran
     * Actor: Penyewa
     * Desc: Membuat data pembayaran baru (Upload bukti atau Checkout).
     */
   public function store(Request $request)
    {
        $request->validate([
            'booking_id' => 'required|exists:booking,id_booking',
            'total_pembayaran' => 'required|numeric',
            'jenis_pembayaran' => 'required|string',
        ]);

        $pembayaran = new Pembayaran();
        $pembayaran->booking_id = $request->booking_id;
        $pembayaran->total_pembayaran = $request->total_pembayaran;
        $pembayaran->jenis_pembayaran = $request->jenis_pembayaran;
        $pembayaran->status = 'pending';
        $pembayaran->metode_pembayaran = 'Midtrans Gateway';
        $pembayaran->save();

        $orderId = 'PAY-' . $pembayaran->id_pembayaran . '-' . time();

        $pembayaran->midtrans_code = $orderId;
        $pembayaran->save();

        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => (int) $pembayaran->total_pembayaran,
            ],
            'customer_details' => [
                'first_name' => auth()->user()->profile->nama_lengkap ?? 'User',
                'email' => auth()->user()->email,
            ],
        ];

        try {
            $snapToken = Snap::getSnapToken($params);

            return view('pembayaran.pay', [
                'snapToken' => $snapToken,
                'pembayaran' => $pembayaran
            ]);

        } catch (\Exception $e) {
            return back()->with('error', 'Gagal memproses pembayaran: ' . $e->getMessage());
        }
    }

    public function notificationHandler(Request $request)
    {
        $orderId = $request->input('order_id');
        $transactionStatus = $request->input('transaction_status');
        $paymentType = $request->input('payment_type');

        $pembayaran = Pembayaran::where('midtrans_code', $orderId)->first();
        if (!$pembayaran) return response(['message' => 'Not found'], 404);

        $booking = $pembayaran->booking;

        $isPaid = false;
        if ($transactionStatus == 'capture' || $transactionStatus == 'settlement') {
            $pembayaran->status = 'verified';
            $isPaid = true;
        } elseif ($transactionStatus == 'expire' || $transactionStatus == 'cancel' || $transactionStatus == 'deny') {
            $pembayaran->status = 'failed';
            $booking->update(['status_booking' => 'cancel']);
        }

        $pembayaran->metode_pembayaran = $paymentType;
        $pembayaran->save();

        if ($isPaid) {
            if (abs($pembayaran->total_pembayaran - $booking->total_harga) < 1000) {
                $booking->update(['status_booking' => 'lunas']);
            } else {
                $booking->update(['status_booking' => 'dp_50']);
            }
            if ($booking->kamar) {
                $booking->kamar->update(['status' => 'tidak tersedia']);
            }
        }

        return response(['message' => 'Status Updated']);
    }
    /**
     * GET /admin/pembayaran
     * Actor: Admin
     * Desc: Monitoring seluruh pembayaran masuk.
     */
    public function adminIndex()
    {
        $pembayaran = Pembayaran::with(['booking.user', 'booking.kamar'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.pembayaran.index', compact('pembayaran'));
    }

    /**
     * GET /pemilik/pembayaran
     * Actor: Pemilik
     * Desc: Laporan keuangan (Bisa sama dengan view admin atau beda view).
     */
    public function pemilikIndex()
    {
        $pembayaran = Pembayaran::with(['booking.kamar'])
            ->where('status', 'verified')
            ->orderBy('created_at', 'desc')
            ->get();

        $totalPendapatan = $pembayaran->sum('total_pembayaran');

        return view('pemilik.pembayaran.laporan', compact('pembayaran', 'totalPendapatan'));
    }
}
