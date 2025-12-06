@extends('layouts.layoutPenyewa')

@section('title', 'Selesaikan Pembayaran')

@section('konten')
<!-- Load Midtrans JS -->
<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0 rounded-4 text-center p-5">
                <div class="mb-4">
                    <i class="fas fa-wallet fa-4x text-primary"></i>
                </div>
                
                <h3 class="fw-bold mb-3">Selesaikan Pembayaran</h3>
                <p class="text-muted">Booking ID: #{{ $booking->id_booking }}</p>

                <div class="bg-light p-3 rounded mb-4">
                    <div class="d-flex justify-content-between">
                        <span>Jenis Pembayaran</span>
                        <span class="fw-bold text-uppercase">{{ str_replace('_', ' ', $pembayaran->jenis_pembayaran) }}</span>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <span>Total Bayar</span>
                        <span class="fw-bold fs-5 text-primary">Rp {{ number_format($pembayaran->total_pembayaran, 0, ',', '.') }}</span>
                    </div>
                </div>

                <button id="pay-button" class="btn btn-primary w-100 py-3 rounded-pill fw-bold shadow-sm">
                    <i class="fas fa-lock me-2"></i> Bayar Sekarang
                </button>
                
                <p class="mt-3 small text-muted">
                    Pembayaran aman diproses oleh Midtrans.
                </p>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var payButton = document.getElementById('pay-button');
    
    payButton.addEventListener('click', function () {
        window.snap.pay('{{ $snapToken }}', {
            onSuccess: function(result){
                window.location.href = "{{ route('booking.index') }}";
                alert("Pembayaran Berhasil!");
            },
            onPending: function(result){
                alert("Menunggu Pembayaran...");
                window.location.href = "{{ route('booking.index') }}";
            },
            onError: function(result){
                alert("Pembayaran Gagal!");
            },
            onClose: function(){
                alert('Anda menutup popup tanpa menyelesaikan pembayaran');
            }
        });
    });

    // Optional: Auto trigger click
    // payButton.click();
</script>
@endsection