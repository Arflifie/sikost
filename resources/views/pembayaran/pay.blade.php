@extends('layouts.layout_utama')

@section('content')
<div class="container py-5 d-flex justify-content-center">
    <div class="card shadow-sm" style="width: 400px;">
        <div class="card-header bg-primary text-white text-center">
            <h5>Konfirmasi Pembayaran</h5>
        </div>
        <div class="card-body text-center">
            <h2 class="fw-bold mb-0">Rp {{ number_format($pembayaran->total_pembayaran, 0, ',', '.') }}</h2>
            <p class="text-muted small">ID Transaksi: {{ $pembayaran->midtrans_code }}</p>
            
            <hr>
            
            <p>Silakan selesaikan pembayaran untuk memverifikasi booking Anda.</p>
            
            <button id="pay-button" class="btn btn-success w-100 py-2 fw-bold">
                Pilih Metode Pembayaran
            </button>
        </div>
    </div>
</div>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
<script type="text/javascript">
    document.getElementById('pay-button').onclick = function(){
        window.snap.pay('{{ $snapToken }}', {
            onSuccess: function(result){
                window.location.href = "{{ route('pembayaran.index') }}";
            },
            onPending: function(result){
                alert("Menunggu pembayaran!");
                window.location.href = "{{ route('pembayaran.index') }}";
            },
            onError: function(result){
                alert("Pembayaran gagal!");
                window.location.href = "{{ route('pembayaran.index') }}";
            }
        });
    };
</script>
@endsection