@extends('layouts.layout_utama')

@section('content')
<div class="container py-5">

    {{-- HEADER --}}
    <div class="row mb-4">
        <div class="col-12">
            <h2 class="fw-bold text-dark">Tagihan Sewa</h2>
            <p class="text-muted">Halaman ini digunakan untuk menguji fitur pembayaran & laporan tagihan.</p>
        </div>
    </div>

    <div class="row">
        {{-- FORM POST TAGIHAN --}}
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-bottom-0 pt-4 pb-0">
                    <h5 class="fw-bold text-primary">Buat / Lanjutkan Tagihan (POST)</h5>
                </div>

                <div class="card-body p-4">
                    <form action="/tagihan" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-bold">Booking ID</label>
                            <input type="number" name="booking_id" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Total Pembayaran</label>
                            <input type="number" name="total_pembayaran" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Metode Pembayaran</label>
                            <input type="text" name="metode_pembayaran" class="form-control" placeholder="Transfer / Cash / dll">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Jenis Pembayaran</label>
                            <input type="text" name="jenis_pembayaran" class="form-control" placeholder="DP / Pelunasan / Sewa Bulanan">
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            <i class="bi bi-credit-card"></i> Kirim Tagihan
                        </button>
                    </form>
                </div>
            </div>
        </div>


        {{-- GET HISTORY / LAPORAN --}}
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-bottom-0 pt-4 pb-0">
                    <h5 class="fw-bold text-primary">Aksi Tagihan Lainnya (GET)</h5>
                </div>

                <div class="card-body p-4">

                    <div class="mb-3">
                        <label class="fw-bold mb-2">History Tagihan Penyewa</label><br>
                        <a href="/tagihan" class="btn btn-secondary w-100">
                            <i class="bi bi-clock-history"></i> Cek History Tagihan
                        </a>
                    </div>

                    <div class="mb-3">
                        <label class="fw-bold mb-2">Laporan Tagihan (Admin)</label><br>
                        <a href="/admin/tagihan" class="btn btn-warning w-100">
                            <i class="bi bi-file-earmark-bar-graph"></i> Lihat Laporan Admin
                        </a>
                    </div>

                    <div>
                        <label class="fw-bold mb-2">Laporan Tagihan (Pemilik)</label><br>
                        <a href="/pemilik/tagihan" class="btn btn-success w-100">
                            <i class="bi bi-building"></i> Lihat Laporan Pemilik
                        </a>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection
