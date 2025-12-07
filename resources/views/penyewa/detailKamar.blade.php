@extends('layouts.layoutPenyewa')

@section('title', 'Detail Kamar - SiKos')

@section('konten')
<link rel="stylesheet" href="{{ asset('css/kamarPenyewa.css') }}">

<div class="detail-section">
    <div class="container">
        <div class="detail-container">
            <!-- Image Gallery -->
            <div class="image-gallery">
                <img src="https://images.unsplash.com/photo-1522771739844-6a9f6d5f14af?w=800" 
                     alt="Kamar Utama" 
                     class="main-image" 
                     id="mainImage">
                <div class="image-badge">Tersedia</div>
            </div>

            <!-- Content -->
            <div class="detail-content">
                <!-- Header -->
                <div class="room-header">
                    <div class="room-title">
                        <h1>Kamar Kos Premium AC</h1>
                        <div class="room-location">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Jl. Sudirman No. 123, Jambi</span>
                        </div>
                    </div>
                    <div class="room-price">
                        <div class="price-amount">Rp 1.500.000</div>
                        <div class="price-period">per-tahun</div>
                    </div>
                </div>

                <!-- Info Grid -->
                <div class="info-grid">
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-bed"></i>
                        </div>
                        <div class="info-text">
                            <h4>Tipe Kamar</h4>
                            <p>Single Bed</p>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-ruler-combined"></i>
                        </div>
                        <div class="info-text">
                            <h4>Ukuran</h4>
                            <p>3 x 4 meter</p>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="info-text">
                            <h4>Kapasitas</h4>
                            <p>1 Orang</p>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-door-open"></i>
                        </div>
                        <div class="info-text">
                            <h4>Nomor Kamar</h4>
                            <p>A-05</p>
                        </div>
                    </div>
                </div>

                <!-- Fasilitas -->
                <div class="section-block">
                    <h2>Fasilitas Kamar</h2>
                    <div class="facilities-grid">
                        <div class="facility-item">
                            <i class="fas fa-snowflake"></i>
                            <span>AC</span>
                        </div>
                        <div class="facility-item">
                            <i class="fas fa-wifi"></i>
                            <span>WiFi Gratis</span>
                        </div>
                        <div class="facility-item">
                            <i class="fas fa-bed"></i>
                            <span>Kasur + Bantal</span>
                        </div>
                        <div class="facility-item">
                            <i class="fas fa-tshirt"></i>
                            <span>Lemari Pakaian</span>
                        </div>
                        <div class="facility-item">
                            <i class="fas fa-chair"></i>
                            <span>Meja & Kursi Belajar</span>
                        </div>
                        <div class="facility-item">
                            <i class="fas fa-shower"></i>
                            <span>Kamar Mandi Dalam</span>
                        </div>
                        <div class="facility-item">
                            <i class="fas fa-plug"></i>
                            <span>Stop Kontak</span>
                        </div>
                        <div class="facility-item">
                            <i class="fas fa-lightbulb"></i>
                            <span>Penerangan 24 Jam</span>
                        </div>
                        <div class="facility-item">
                            <i class="fas fa-parking"></i>
                            <span>Area Parkir</span>
                        </div>
                        <div class="facility-item">
                            <i class="fas fa-shield-alt"></i>
                            <span>CCTV 24 Jam</span>
                        </div>
                        <div class="facility-item">
                            <i class="fas fa-broom"></i>
                            <span>Cleaning Service</span>
                        </div>
                        <div class="facility-item">
                            <i class="fas fa-utensils"></i>
                            <span>Dapur Bersama</span>
                        </div>
                    </div>
                </div>

                <!-- Deskripsi -->
                <div class="section-block">
                    <h2>Deskripsi</h2>
                    <p class="description-text">
                        Kamar kos premium dengan fasilitas lengkap dan nyaman untuk mahasiswa maupun pekerja profesional. 
                        Lokasi strategis dekat dengan kampus, pusat perbelanjaan, dan transportasi umum. 
                        Lingkungan aman, bersih, dan kondusif untuk belajar dan beristirahat. 
                        Dilengkapi dengan AC, WiFi super cepat, kamar mandi dalam, dan furniture berkualitas. 
                        Pengelolaan profesional dengan sistem keamanan 24 jam dan layanan cleaning service berkala.
                    </p>
                </div>

                <!-- Peraturan -->
                <div class="section-block">
                    <h2>Peraturan Kos</h2>
                    <ul class="rules-list">
                        <li>
                            <i class="fas fa-check-circle"></i>
                            <span>Tidak boleh merokok</span>
                        </li>
                        <li>
                            <i class="fas fa-check-circle"></i>
                            <span>Tamu wajib lapor ke pengelola maksimal jam 21.00 WIB</span>
                        </li>
                        <li>
                            <i class="fas fa-check-circle"></i>
                            <span>Menjaga kebersihan dan ketertiban lingkungan</span>
                        </li>
                        <li>
                            <i class="fas fa-ban"></i>
                            <span>Dilarang membawa hewan peliharaan</span>
                        </li>
                        <li>
                            <i class="fas fa-ban"></i>
                            <span>Dilarang membuat keributan setelah jam 22.00 WIB</span>
                        </li>
                        <li>
                            <i class="fas fa-ban"></i>
                            <span>Dilarang merokok di dalam kamar</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="action-section">
                <a href="{{ route('kamar.index') }}" class="btn-contact">
                    <i class="fas fa-arrow-left"></i>
                    <span>Kembali</span>
                </a>
                <a class="btn-booking" href="#">
                    <i class="fas fa-calendar-check"></i>
                    <span>Booking Sekarang</span>
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    function changeImage(thumbnail, imageUrl) {
        // Update main image
        document.getElementById('mainImage').src = imageUrl;
        
        // Remove active class from all thumbnails
        document.querySelectorAll('.thumbnail').forEach(thumb => {
            thumb.classList.remove('active');
        });
        
        // Add active class to clicked thumbnail
        thumbnail.classList.add('active');
    }
</script>
@endsection