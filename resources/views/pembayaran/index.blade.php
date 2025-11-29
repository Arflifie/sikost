@extends('layouts.layout_utama')

@section('content')
<div class="container py-5">
    <h3 class="mb-4">Halaman Pembayaran (Penyewa)</h3>

    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">Buat Pembayaran Baru</div>
                <div class="card-body">
                    <form action="{{ route('pembayaran.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label class="form-label">ID Booking</label>
                            <input type="number" name="booking_id" class="form-control" placeholder="Contoh: 1" required>
                            <small class="text-muted">Pastikan ID Booking 1 ada di database.</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nominal (Rp)</label>
                            <input type="number" name="total_pembayaran" class="form-control" placeholder="500000" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Jenis</label>
                            <select name="jenis_pembayaran" class="form-select">
                                <option value="DP">Uang Muka (DP)</option>
                                <option value="Lunas">Lunas</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Metode</label>
                            <select name="metode_pembayaran" class="form-select">
                                <option value="Transfer Bank">Transfer Bank</option>
                                <option value="Cash">Tunai</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Bayar Sekarang</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header">Riwayat Pembayaran Saya</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Booking Ref</th>
                                <th>Total</th>
                                <th>Metode</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pembayaran as $p)
                            <tr>
                                <td>#{{ $p->id_pembayaran }}</td>
                                <td>Booking #{{ $p->booking_id }}</td>
                                <td>{{ $p->total_rupiah }}</td>
                                <td>{{ $p->metode_pembayaran }}</td>
                                <td>
                                    <span class="badge bg-{{ $p->status_badge }}">
                                        {{ ucfirst($p->status) }}
                                    </span>
                                </td>
                                <td>{{ $p->created_at->format('d M Y') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">Belum ada riwayat pembayaran.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection