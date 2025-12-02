<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KosKita - Temukan Kos Impianmu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --royal: #334EAC;
            --moon: #F7F2EB;
            --china: #7096D1;
            --asian-pear: #F2F0DE;
            --midnight: #081F5C;
            --dawn: #D0E3FF;
            --jicama: #FFF9F0;
            --porcelain: #EDF1F6;
            --sky: #BAD6EB;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--midnight);
            overflow-x: hidden;
        }

        /* Navbar */
        .navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 1.2rem 0;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .navbar-brand {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--royal) !important;
            letter-spacing: -0.5px;
        }

        .nav-link {
            color: var(--midnight) !important;
            font-weight: 500;
            margin: 0 1rem;
            transition: color 0.3s ease;
            position: relative;
        }

        .nav-link:hover {
            color: var(--royal) !important;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--royal);
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .btn-primary-custom {
            background: var(--royal);
            color: white;
            padding: 0.7rem 2rem;
            border-radius: 50px;
            border: none;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(51, 78, 172, 0.3);
        }

        .btn-primary-custom:hover {
            background: var(--midnight);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(8, 31, 92, 0.4);
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, var(--dawn) 0%, var(--sky) 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            width: 500px;
            height: 500px;
            background: var(--china);
            border-radius: 50%;
            opacity: 0.1;
            top: -100px;
            right: -100px;
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(20px); }
        }

        .hero-content h1 {
            font-size: 4rem;
            font-weight: 800;
            color: var(--midnight);
            line-height: 1.2;
            margin-bottom: 1.5rem;
        }

        .hero-content p {
            font-size: 1.3rem;
            color: var(--royal);
            margin-bottom: 2.5rem;
            max-width: 600px;
        }

        .hero-image {
            position: relative;
            animation: slideIn 1s ease-out;
        }

        @keyframes slideIn {
            from { opacity: 0; transform: translateX(50px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .hero-image img {
            width: 100%;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
        }

        /* Search Box */
        .search-box {
            background: white;
            padding: 1.5rem;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            display: flex;
            gap: 1rem;
            max-width: 700px;
            margin-top: 2rem;
        }

        .search-box input, .search-box select {
            border: 2px solid var(--porcelain);
            border-radius: 10px;
            padding: 0.9rem 1.2rem;
            font-size: 1rem;
            transition: border 0.3s ease;
        }

        .search-box input:focus, .search-box select:focus {
            border-color: var(--royal);
            outline: none;
            box-shadow: 0 0 0 4px rgba(51, 78, 172, 0.1);
        }

        .btn-search {
            background: var(--royal);
            color: white;
            border: none;
            padding: 0.9rem 2.5rem;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
            white-space: nowrap;
        }

        .btn-search:hover {
            background: var(--midnight);
            transform: scale(1.05);
        }

        /* Features Section */
        .features-section {
            padding: 6rem 0;
            background: var(--jicama);
        }

        .section-title {
            text-align: center;
            margin-bottom: 4rem;
        }

        .section-title h2 {
            font-size: 2.8rem;
            font-weight: 700;
            color: var(--midnight);
            margin-bottom: 1rem;
        }

        .section-title p {
            font-size: 1.2rem;
            color: var(--royal);
        }

        .feature-card {
            background: white;
            padding: 2.5rem;
            border-radius: 20px;
            text-align: center;
            transition: all 0.3s ease;
            border: 2px solid transparent;
            height: 100%;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
            border-color: var(--royal);
        }

        .feature-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--royal), var(--china));
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 2rem;
            color: white;
        }

        .feature-card h3 {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--midnight);
            margin-bottom: 1rem;
        }

        .feature-card p {
            color: var(--royal);
            line-height: 1.6;
        }

        /* Popular Kos Section */
        .kos-section {
            padding: 6rem 0;
            background: white;
        }

        .kos-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            height: 100%;
        }

        .kos-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
        }

        .kos-image {
            position: relative;
            overflow: hidden;
            height: 250px;
        }

        .kos-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .kos-card:hover .kos-image img {
            transform: scale(1.1);
        }

        .kos-badge {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: var(--royal);
            color: white;
            padding: 0.4rem 1rem;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .kos-content {
            padding: 1.5rem;
        }

        .kos-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--midnight);
            margin-bottom: 0.5rem;
        }

        .kos-location {
            color: var(--royal);
            font-size: 0.95rem;
            margin-bottom: 1rem;
        }

        .kos-facilities {
            display: flex;
            gap: 1rem;
            margin-bottom: 1rem;
            flex-wrap: wrap;
        }

        .facility-item {
            display: flex;
            align-items: center;
            gap: 0.3rem;
            color: var(--china);
            font-size: 0.9rem;
        }

        .kos-price {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--royal);
        }

        .kos-price span {
            font-size: 0.9rem;
            font-weight: 400;
            color: var(--china);
        }

        /* CTA Section */
        .cta-section {
            background: linear-gradient(135deg, var(--royal), var(--midnight));
            padding: 5rem 0;
            color: white;
            text-align: center;
        }

        .cta-section h2 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
        }

        .cta-section p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        .btn-light-custom {
            background: white;
            color: var(--royal);
            padding: 1rem 3rem;
            border-radius: 50px;
            border: none;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
        }

        .btn-light-custom:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 30px rgba(255, 255, 255, 0.3);
        }

        /* Footer */
        .footer {
            background: var(--midnight);
            color: white;
            padding: 4rem 0 2rem;
        }

        .footer h5 {
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: var(--dawn);
        }

        .footer ul {
            list-style: none;
            padding: 0;
        }

        .footer ul li {
            margin-bottom: 0.8rem;
        }

        .footer ul li a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer ul li a:hover {
            color: white;
            padding-left: 5px;
        }

        .social-links {
            display: flex;
            gap: 1rem;
        }

        .social-links a {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            background: var(--royal);
            transform: translateY(-3px);
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            margin-top: 3rem;
            padding-top: 2rem;
            text-align: center;
            color: rgba(255, 255, 255, 0.6);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-content h1 {
                font-size: 2.5rem;
            }

            .hero-content p {
                font-size: 1.1rem;
            }

            .search-box {
                flex-direction: column;
            }

            .section-title h2 {
                font-size: 2rem;
            }

            .navbar-brand {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">KosKita</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Fitur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#kos">Kos Populer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tentang">Tentang</a>
                    </li>
                    <li class="nav-item ms-3">
                        <button class="btn btn-primary-custom">Daftar Sekarang</button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section" id="home">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 hero-content">
                    <h1>Temukan Kos Impianmu dengan Mudah</h1>
                    <p>Platform terpercaya untuk mahasiswa mencari hunian nyaman, aman, dan terjangkau di seluruh Indonesia</p>
                    
                    <div class="search-box">
                        <input type="text" class="form-control" placeholder="Cari lokasi kos...">
                        <select class="form-select">
                            <option>Semua Tipe</option>
                            <option>Kos Putra</option>
                            <option>Kos Putri</option>
                            <option>Kos Campur</option>
                        </select>
                        <button class="btn btn-search">
                            <i class="fas fa-search"></i> Cari
                        </button>
                    </div>
                </div>
                <div class="col-lg-6 mt-5 mt-lg-0">
                    <div class="hero-image">
                        <img src="https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?w=800" alt="Hero Image">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section" id="features">
        <div class="container">
            <div class="section-title">
                <h2>Kenapa Pilih KosKita?</h2>
                <p>Kemudahan dan kenyamanan dalam satu platform</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h3>Aman & Terpercaya</h3>
                        <p>Semua kos terverifikasi dan dijamin keamanannya</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-search-location"></i>
                        </div>
                        <h3>Mudah Dicari</h3>
                        <p>Temukan kos dengan filter lokasi dan fasilitas</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-wallet"></i>
                        </div>
                        <h3>Harga Terjangkau</h3>
                        <p>Berbagai pilihan kos sesuai budget mahasiswa</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-headset"></i>
                        </div>
                        <h3>Support 24/7</h3>
                        <p>Tim kami siap membantu kapan saja</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Popular Kos Section -->
    <section class="kos-section" id="kos">
        <div class="container">
            <div class="section-title">
                <h2>Kos Paling Populer</h2>
                <p>Pilihan favorit mahasiswa di berbagai kota</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="kos-card">
                        <div class="kos-image">
                            <img src="https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?w=600" alt="Kos 1">
                            <span class="kos-badge">Populer</span>
                        </div>
                        <div class="kos-content">
                            <h3 class="kos-title">Kos Melati Residence</h3>
                            <p class="kos-location">
                                <i class="fas fa-map-marker-alt"></i> Yogyakarta
                            </p>
                            <div class="kos-facilities">
                                <span class="facility-item">
                                    <i class="fas fa-wifi"></i> WiFi
                                </span>
                                <span class="facility-item">
                                    <i class="fas fa-snowflake"></i> AC
                                </span>
                                <span class="facility-item">
                                    <i class="fas fa-utensils"></i> Dapur
                                </span>
                            </div>
                            <div class="kos-price">
                                Rp 1.2jt <span>/ bulan</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="kos-card">
                        <div class="kos-image">
                            <img src="https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?w=600" alt="Kos 2">
                            <span class="kos-badge">Rekomendasi</span>
                        </div>
                        <div class="kos-content">
                            <h3 class="kos-title">Kos Mawar Indah</h3>
                            <p class="kos-location">
                                <i class="fas fa-map-marker-alt"></i> Bandung
                            </p>
                            <div class="kos-facilities">
                                <span class="facility-item">
                                    <i class="fas fa-wifi"></i> WiFi
                                </span>
                                <span class="facility-item">
                                    <i class="fas fa-parking"></i> Parkir
                                </span>
                                <span class="facility-item">
                                    <i class="fas fa-tv"></i> TV
                                </span>
                            </div>
                            <div class="kos-price">
                                Rp 950rb <span>/ bulan</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="kos-card">
                        <div class="kos-image">
                            <img src="https://images.unsplash.com/photo-1540518614846-7eded433c457?w=600" alt="Kos 3">
                            <span class="kos-badge">Baru</span>
                        </div>
                        <div class="kos-content">
                            <h3 class="kos-title">Kos Anggrek Premium</h3>
                            <p class="kos-location">
                                <i class="fas fa-map-marker-alt"></i> Surabaya
                            </p>
                            <div class="kos-facilities">
                                <span class="facility-item">
                                    <i class="fas fa-wifi"></i> WiFi
                                </span>
                                <span class="facility-item">
                                    <i class="fas fa-swimming-pool"></i> Kolam
                                </span>
                                <span class="facility-item">
                                    <i class="fas fa-dumbbell"></i> Gym
                                </span>
                            </div>
                            <div class="kos-price">
                                Rp 1.5jt <span>/ bulan</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <h2>Siap Temukan Kos Impianmu?</h2>
            <p>Bergabunglah dengan ribuan mahasiswa yang sudah menemukan hunian nyaman mereka</p>
            <button class="btn btn-light-custom">Mulai Sekarang <i class="fas fa-arrow-right ms-2"></i></button>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <h5>KosKita</h5>
                    <p style="opacity: 0.8;">Platform terpercaya untuk mahasiswa mencari hunian nyaman dan terjangkau di seluruh Indonesia.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
                    <h5>Perusahaan</h5>
                    <ul>
                        <li><a href="#">Tentang Kami</a></li>
                        <li><a href="#">Karir</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Press Kit</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
                    <h5>Layanan</h5>
                    <ul>
                        <li><a href="#">Cari Kos</a></li>
                        <li><a href="#">Pasang Iklan</a></li>
                        <li><a href="#">Panduan</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
                    <h5>Legal</h5>
                    <ul>
                        <li><a href="#">Syarat & Ketentuan</a></li>
                        <li><a href="#">Kebijakan Privasi</a></li>
                        <li><a href="#">Cookie Policy</a></li>
                        <li><a href="#">Lisensi</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6">
                    <h5>Kontak</h5>
                    <ul>
                        <li><a href="#"><i class="fas fa-envelope me-2"></i>info@koskita.id</a></li>
                        <li><a href="#"><i class="fas fa-phone me-2"></i>+62 812-3456-7890</a></li>
                        <li><a href="#"><i class="fas fa-map-marker-alt me-2"></i>Jakarta, Indonesia</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 KosKita. All rights reserved. Made with <i class="fas fa-heart" style="color: #ff6b6b;"></i> for Indonesian Students</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.style.padding = '0.8rem 0';
                navbar.style.boxShadow = '0 5px 30px rgba(0, 0, 0, 0.1)';
            } else {
                navbar.style.padding = '1.2rem 0';
                navbar.style.boxShadow = '0 2px 20px rgba(0, 0, 0, 0.05)';
            }
        });

        // Smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</body>
</html>