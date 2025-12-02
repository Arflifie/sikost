@extends('layouts.layout_utama')

@section('content')
<div class="container py-4">

    <h3 class="mb-4 fw-bold">
        <i class="bi bi-house-door"></i> Daftar Kamar Tersedia
    </h3>

    <div class="row">
        @forelse ($kamar as $item)
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm h-100">
                <img src="{{ Storage::disk('s3')->url($item->foto_kamar) }}">
                <div class="card-body d-flex flex-column">

                    <h5 class="card-title">
                        Kamar {{ $item->nomor_kamar }}
                    </h5>
                    
                    <p class="card-text text-muted">
                        {{ $item->deskripsi }}
                    </p>

                    <h6 class="text-success mb-3">
                        Rp {{ number_format($item->harga, 0, ',', '.') }}
                    </h6>

                    @if($item->status == 'tersedia')
                        <span class="badge bg-success mb-2">Tersedia</span>
                    @else
                        <span class="badge bg-danger mb-2">Tidak tersedia</span>
                    @endif

                    <a href="/kamar/{{ $item->id_kamar }}" 
                       class="btn btn-primary btn-sm mt-auto">
                        Lihat Detail
                    </a>

                </div>
            </div>
        </div>
        @empty
            <div class="col-12">
                <div class="alert alert-warning text-center">
                    Tidak ada kamar yang tersedia saat ini.
                </div>
            </div>
        @endforelse
    </div>

</div>
@endsection
