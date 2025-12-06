@extends('layouts.layoutPenyewa')

@section('title', 'Form Booking Kamar')

@section('konten')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            
            <h2 class="fw-bold mb-4">Konfirmasi Booking</h2>

            <div class="row g-4">
                <!-- KOLOM KIRI: Detail Kamar -->
                <div class="col-md-5">
                    <div class="card border-0 shadow-sm h-100">
                        <img src="{{ Storage::disk('s3')->url($kamar->foto_kamar) }}" alt="Kamar {{ $kamar->no_kamar }}">
                        <div class="card-body p-4">
                            <h4 class="fw-bold">Kamar {{ $kamar->no_kamar }}</h4>
                            <p class="text-muted mb-3"><i class="fas fa-map-marker-alt me-2"></i>SiKos Area Utama</p>
                            
                            <hr>
                            
                            <h5 class="text-primary fw-bold mb-1">
                                Rp {{ number_format($kamar->harga, 0, ',', '.') }}
                                <span class="text-muted small fw-normal">/ tahun</span>
                            </h5>
                            <p class="small text-muted mt-2">
                                {{ $kamar->deskripsi_kamar ?? 'Fasilitas lengkap dengan AC, WiFi, dan Kamar Mandi Dalam.' }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- KOLOM KANAN: Form Input -->
                <div class="col-md-7">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4">
                            <h4 class="mb-3">Isi Data Sewa</h4>
                            
                            <!-- Alert Info Profile -->
                            <div class="alert alert-success d-flex align-items-center mb-4" role="alert">
                                <i class="fas fa-user-check me-2 fs-4"></i>
                                <div>
                                    <small class="d-block fw-bold">Data Penyewa Terverifikasi</small>
                                    <small>{{ $profile->nama_lengkap }} (NIK: {{ $profile->nik }})</small>
                                </div>
                            </div>

                            <form action="{{ route('booking.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="kamar_id" value="{{ $kamar->id_kamar }}">
                                
                                <!-- Tanggal Mulai Ngekos -->
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Mulai Tanggal Berapa?</label>
                                    <input type="date" name="tanggal_check_in" class="form-control form-control-lg" required min="{{ date('Y-m-d') }}">
                                </div>

                                <!-- Durasi Sewa -->
                                <div class="mb-4">
                                    <label class="form-label fw-bold">Durasi Sewa (Tahun)</label>
                                    <select name="durasi_tahun" id="durasi" class="form-select form-select-lg">
                                        <option value="1">1 Tahun</option>
                                        <option value="2">2 Tahun</option>
                                        <option value="3">3 Tahun</option>
                                    </select>
                                </div>

                                <!-- Ringkasan Pembayaran -->
                                <div class="bg-light p-3 rounded mb-4">
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>Harga Sewa</span>
                                        <span id="harga-display">Rp {{ number_format($kamar->harga, 0, ',', '.') }}</span>
                                    </div>
                                    <div class="d-flex justify-content-between fw-bold fs-5 text-primary">
                                        <span>Total Pembayaran</span>
                                        <span id="total-display">Rp {{ number_format($kamar->harga, 0, ',', '.') }}</span>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label fw-bold">Opsi Pembayaran Awal</label>
                                    <div class="card p-3 bg-light border-0">
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="radio" name="opsi_bayar" id="bayar_full" value="100" checked>
                                            <label class="form-check-label fw-bold" for="bayar_full">
                                                Bayar Lunas (100%)
                                            </label>
                                            <div class="text-muted small">Lunyasi seluruh masa sewa sekarang.</div>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="opsi_bayar" id="bayar_dp" value="50">
                                            <label class="form-check-label fw-bold" for="bayar_dp">
                                                Down Payment (50%)
                                            </label>
                                            <div class="text-muted small">Bayar setengah dulu, sisanya saat check-in.</div>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary w-100 py-3 fw-bold rounded-pill">
                                    Lanjut ke Pembayaran <i class="fas fa-arrow-right ms-2"></i>
                                </button>
                                
                                <a href="{{ route('kamar.index') }}" class="btn btn-outline-secondary w-100 mt-2 rounded-pill border-0">
                                    Batal
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    const hargaPerTahun = {{ $kamar->harga }};
    const selectDurasi = document.getElementById('durasi');
    const totalDisplay = document.getElementById('total-display');
    const radioFull = document.getElementById('bayar_full');
    const radioDp = document.getElementById('bayar_dp');
    const hargaDisplay = document.getElementById('harga-display');

    function calculateTotal() {
        let tahun = selectDurasi.value;
        let totalAsli = hargaPerTahun * tahun;
        
        let percentage = radioFull.checked ? 1 : 0.5;
        let totalBayar = totalAsli * percentage;

        let formatter = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' });
        
        hargaDisplay.innerText = formatter.format(totalAsli).replace(',00', ''); // Harga Asli
        totalDisplay.innerText = formatter.format(totalBayar).replace(',00', ''); // Yang harus dibayar
    }

    selectDurasi.addEventListener('change', calculateTotal);
    radioFull.addEventListener('change', calculateTotal);
    radioDp.addEventListener('change', calculateTotal);
    
    calculateTotal();
</script>
@endsection