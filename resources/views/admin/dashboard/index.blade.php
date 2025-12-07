<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - KostKu</title>
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
            background: var(--jicama);
        }

        /* Sidebar Styles */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 260px;
            background: linear-gradient(180deg, var(--midnight) 0%, var(--royal) 100%);
            padding: 2rem 0;
            transition: all 0.3s ease;
            z-index: 1000;
            box-shadow: 4px 0 20px rgba(0, 0, 0, 0.1);
        }

        .sidebar.collapsed {
            width: 80px;
        }

        .sidebar-brand {
            padding: 0 1.5rem;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .sidebar-brand i {
            font-size: 2rem;
            color: white;
        }

        .sidebar-brand h3 {
            color: white;
            font-size: 1.5rem;
            font-weight: 700;
            margin: 0;
            white-space: nowrap;
            transition: opacity 0.3s ease;
        }

        .sidebar.collapsed .sidebar-brand h3,
        .sidebar.collapsed .nav-text {
            opacity: 0;
            width: 0;
            overflow: hidden;
        }

        .sidebar-nav {
            list-style: none;
            padding: 0;
        }

        .nav-item {
            margin-bottom: 0.5rem;
        }

        .nav-link-custom {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem 1.5rem;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-link-custom:hover {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            padding-left: 2rem;
        }

        .nav-link-custom.active {
            background: rgba(255, 255, 255, 0.15);
            color: white;
            border-left: 4px solid white;
        }

        .nav-link-custom i {
            font-size: 1.3rem;
            min-width: 24px;
        }

        .nav-text {
            white-space: nowrap;
            transition: opacity 0.3s ease;
        }

        .logout-link {
            position: absolute;
            bottom: 2rem;
            width: 100%;
        }

        .logout-link .nav-link-custom {
            color: #ff6b6b;
        }

        .logout-link .nav-link-custom:hover {
            background: rgba(255, 107, 107, 0.1);
            color: #ff5252;
        }

        /* Main Content */
        .main-content {
            margin-left: 260px;
            min-height: 100vh;
            transition: margin-left 0.3s ease;
        }

        .main-content.expanded {
            margin-left: 80px;
        }

        /* Top Navbar */
        .top-navbar {
            background: white;
            padding: 1.2rem 2rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 999;
        }

        .toggle-btn {
            background: var(--porcelain);
            border: none;
            padding: 0.6rem 1rem;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            color: var(--royal);
            font-size: 1.2rem;
        }

        .toggle-btn:hover {
            background: var(--royal);
            color: white;
            transform: scale(1.05);
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .user-avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--royal), var(--china));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 1.1rem;
        }

        .user-details h6 {
            margin: 0;
            color: var(--midnight);
            font-weight: 600;
            font-size: 0.95rem;
        }

        .user-details p {
            margin: 0;
            color: var(--china);
            font-size: 0.85rem;
        }

        /* Dashboard Content */
        .dashboard-content {
            padding: 2rem;
        }

        .page-header {
            margin-bottom: 2rem;
        }

        .page-header h1 {
            color: var(--midnight);
            font-weight: 700;
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .page-header p {
            color: var(--china);
            font-size: 1rem;
        }

        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: white;
            padding: 1.8rem;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            border-left: 4px solid var(--royal);
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }

        .stat-card.orange {
            border-left-color: #ff9f43;
        }

        .stat-card.green {
            border-left-color: #26de81;
        }

        .stat-card.purple {
            border-left-color: #a55eea;
        }

        .stat-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
        }

        .stat-icon.blue {
            background: linear-gradient(135deg, var(--royal), var(--china));
        }

        .stat-icon.orange {
            background: linear-gradient(135deg, #ff9f43, #ffbe76);
        }

        .stat-icon.green {
            background: linear-gradient(135deg, #26de81, #20bf6b);
        }

        .stat-icon.purple {
            background: linear-gradient(135deg, #a55eea, #8854d0);
        }

        .stat-value {
            font-size: 2rem;
            font-weight: 700;
            color: var(--midnight);
            margin-bottom: 0.3rem;
        }

        .stat-label {
            color: var(--china);
            font-size: 0.95rem;
        }

        /* Chart Section */
        .chart-container {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            margin-bottom: 2rem;
        }

        .chart-header {
            margin-bottom: 1.5rem;
        }

        .chart-header h3 {
            color: var(--midnight);
            font-weight: 700;
            font-size: 1.3rem;
        }

        /* Recent Activity */
        .activity-list {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        .activity-item {
            display: flex;
            gap: 1rem;
            padding: 1rem 0;
            border-bottom: 1px solid var(--porcelain);
        }

        .activity-item:last-child {
            border-bottom: none;
        }

        .activity-icon {
            width: 45px;
            height: 45px;
            border-radius: 10px;
            background: var(--dawn);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--royal);
            font-size: 1.2rem;
        }

        .activity-details h5 {
            color: var(--midnight);
            font-size: 0.95rem;
            font-weight: 600;
            margin-bottom: 0.3rem;
        }

        .activity-details p {
            color: var(--china);
            font-size: 0.85rem;
            margin: 0;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .main-content.expanded {
                margin-left: 0;
            }

            .top-navbar {
                padding: 1rem;
            }

            .dashboard-content {
                padding: 1rem;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .user-details {
                display: none;
            }

            .page-header h1 {
                font-size: 1.5rem;
            }
        }

        /* Mobile Overlay */
        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }

        .sidebar-overlay.show {
            display: block;
        }
    </style>
</head>
<body>
    <!-- Sidebar Overlay (Mobile) -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-brand">
            <i class="fas fa-home"></i>
            <h3 class="nav-text">KostKu</h3>
        </div>

        <ul class="sidebar-nav">
            <li class="nav-item">
                <a href="#" class="nav-link-custom active">
                    <i class="fas fa-th-large"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link-custom">
                    <i class="fas fa-flag"></i>
                    <span class="nav-text">Pelaporan</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link-custom">
                    <i class="fas fa-bed"></i>
                    <span class="nav-text">Kamar</span>
                </a>
            </li>
        </ul>

        <div class="logout-link">
            <a href="#" class="nav-link-custom" onclick="return confirm('Apakah Anda yakin ingin logout?')">
                <i class="fas fa-sign-out-alt"></i>
                <span class="nav-text">Logout</span>
            </a>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="main-content" id="mainContent">
        <!-- Top Navbar -->
        <nav class="top-navbar">
            <button class="toggle-btn" id="toggleBtn">
                <i class="fas fa-bars"></i>
            </button>

            <div class="user-info">
                <div class="user-details">
                    <h6>Admin KostKu</h6>
                    <p>Administrator</p>
                </div>
                <div class="user-avatar">
                    <i class="fas fa-user"></i>
                </div>
            </div>
        </nav>

        <!-- Dashboard Content -->
        <div class="dashboard-content">
            <div class="page-header">
                <h1>Dashboard</h1>
                <p>Selamat datang di panel admin KostKu</p>
            </div>

            <!-- Stats Grid -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-header">
                        <div>
                            <div class="stat-value">156</div>
                            <div class="stat-label">Total Kamar</div>
                        </div>
                        <div class="stat-icon blue">
                            <i class="fas fa-bed"></i>
                        </div>
                    </div>
                </div>

                <div class="stat-card orange">
                    <div class="stat-header">
                        <div>
                            <div class="stat-value">89</div>
                            <div class="stat-label">Kamar Terisi</div>
                        </div>
                        <div class="stat-icon orange">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                </div>

                <div class="stat-card green">
                    <div class="stat-header">
                        <div>
                            <div class="stat-value">67</div>
                            <div class="stat-label">Kamar Tersedia</div>
                        </div>
                        <div class="stat-icon green">
                            <i class="fas fa-check-circle"></i>
                        </div>
                    </div>
                </div>

                <div class="stat-card purple">
                    <div class="stat-header">
                        <div>
                            <div class="stat-value">12</div>
                            <div class="stat-label">Laporan Baru</div>
                        </div>
                        <div class="stat-icon purple">
                            <i class="fas fa-flag"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Chart Container -->
            <div class="chart-container">
                <div class="chart-header">
                    <h3>Statistik Booking Bulanan</h3>
                </div>
                <div style="height: 300px; display: flex; align-items: center; justify-content: center; background: var(--porcelain); border-radius: 10px;">
                    <p style="color: var(--china); font-size: 1rem;">Chart akan ditampilkan di sini</p>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="activity-list">
                <div class="chart-header">
                    <h3>Aktivitas Terbaru</h3>
                </div>
                
                <div class="activity-item">
                    <div class="activity-icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <div class="activity-details">
                        <h5>Penghuni Baru Terdaftar</h5>
                        <p>Budi Santoso mendaftar di Kamar 101 - 2 jam yang lalu</p>
                    </div>
                </div>

                <div class="activity-item">
                    <div class="activity-icon">
                        <i class="fas fa-flag"></i>
                    </div>
                    <div class="activity-details">
                        <h5>Laporan Baru Masuk</h5>
                        <p>Laporan kerusakan AC di Kamar 205 - 3 jam yang lalu</p>
                    </div>
                </div>

                <div class="activity-item">
                    <div class="activity-icon">
                        <i class="fas fa-money-bill"></i>
                    </div>
                    <div class="activity-details">
                        <h5>Pembayaran Diterima</h5>
                        <p>Pembayaran sewa bulan Januari dari Kamar 303 - 5 jam yang lalu</p>
                    </div>
                </div>

                <div class="activity-item">
                    <div class="activity-icon">
                        <i class="fas fa-edit"></i>
                    </div>
                    <div class="activity-details">
                        <h5>Data Kamar Diperbarui</h5>
                        <p>Informasi fasilitas Kamar 108 telah diperbarui - 1 hari yang lalu</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle Sidebar
        const toggleBtn = document.getElementById('toggleBtn');
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('mainContent');
        const sidebarOverlay = document.getElementById('sidebarOverlay');

        toggleBtn.addEventListener('click', function() {
            if (window.innerWidth > 768) {
                // Desktop: collapse sidebar
                sidebar.classList.toggle('collapsed');
                mainContent.classList.toggle('expanded');
            } else {
                // Mobile: show/hide sidebar
                sidebar.classList.toggle('show');
                sidebarOverlay.classList.toggle('show');
            }
        });

        // Close sidebar when clicking overlay (mobile)
        sidebarOverlay.addEventListener('click', function() {
            sidebar.classList.remove('show');
            sidebarOverlay.classList.remove('show');
        });

        // Handle window resize
        window.addEventListener('resize', function() {
            if (window.innerWidth > 768) {
                sidebar.classList.remove('show');
                sidebarOverlay.classList.remove('show');
            } else {
                sidebar.classList.remove('collapsed');
                mainContent.classList.remove('expanded');
            }
        });
    </script>
</body>
</html>