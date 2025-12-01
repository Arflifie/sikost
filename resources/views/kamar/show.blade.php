@extends('layouts.layout_utama')

@section('content')
<div class="container py-4">

    <a href="/kamar" class="btn btn-secondary btn-sm mb-3">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>

    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Detail Kamar {{ $kamar->nomor_kamar }}</h5>
        </div>

        <div class="card-body">
            <p class="mb-3">{{ $kamar->deskripsi }}</p>

            <ul class="list-group mb-3">
                <li class="list-group-item">
                    <strong>Harga:</strong>
                    Rp {{ number_format($kamar->harga, 0, ',', '.') }}
                </li>

                <li class="list-group-item">
                    <strong>Status:</strong>
                    @if($kamar->status == 'tersedia')
                        <span class="badge bg-success">Tersedia</span>
                    @else
                        <span class="badge bg-danger">Tidak tersedia</span>
                    @endif
                </li>
            </ul>
        </div>
    </div>

</div>
@endsection
