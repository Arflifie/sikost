@extends('layouts.layout_utama')

@section('content')
<div class="container py-5">
    <h3 class="mb-4 text-danger">Admin Dashboard - Verifikasi Pembayaran</h3>

    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Penyewa</th>
                        <th>Kamar</th>
                        <th>Nominal</th>
                        <th>Jenis</th>
                        <th>Status Saat Ini</th>
                        <th>Aksi Verifikasi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pembayaran as $p)
                    <tr>
                        <td>{{ $p->id_pembayaran }}</td>
                        <td>{{ $p->booking->user->email ?? 'User Terhapus' }}</td>
                        <td>{{ $p->booking->kamar->no_kamar ?? 'N/A' }}</td>
                        <td>{{ $p->total_rupiah }}</td>
                        <td>{{ $p->jenis_pembayaran }}</td>
                        <td>
                            <span class="badge bg-{{ $p->status_badge }}">
                                {{ ucfirst($p->status) }}
                            </span>
                        </td>
                        <td>
                            @if($p->status == 'pending')
                                <span class="text-muted small">Masih diproses</span>
                            @else
                                <span class="text-muted small">Sudah diproses</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection