@extends('layouts.layout_utama')

@section('content')
<div class="container py-5">
    <h3 class="mb-4 text-primary">Laporan Pendapatan (Pemilik)</h3>

    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5>Total Pendapatan Masuk</h5>
                    <h2 class="fw-bold">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</h2>
                    <small>Hanya pembayaran status 'verified'</small>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">Rincian Transaksi Masuk</div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>No Kamar</th>
                        <th>Jenis Bayar</th>
                        <th>Nominal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pembayaran as $p)
                    <tr>
                        <td>{{ $p->created_at->format('d/m/Y H:i') }}</td>
                        <td>{{ $p->booking->kamar->no_kamar ?? '-' }}</td>
                        <td>{{ $p->jenis_pembayaran }}</td>
                        <td class="text-end fw-bold">{{ $p->total_rupiah }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection