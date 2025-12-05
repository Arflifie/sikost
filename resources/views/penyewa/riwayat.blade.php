@extends('layouts.layoutPenyewa')

@section('konten')
    {{-- ====================================================================
         1. CSS INTERNAL
         ==================================================================== --}}
    <style>
        /* Offset agar konten tidak tenggelam di bawah navbar fixed-top */
        .page-offset {
            padding-top: 120px !important;
        }

        /* Styling Dasar */
        body {
            background-color: var(--color-asean-pear);
            color: var(--color-midnight);
        }

        /* Text Gradient (Untuk Harga) */
        .text-gradient {
            background: linear-gradient(45deg, var(--color-midnight), var(--color-royal));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Kartu Booking */
        .card-booking {
            border: none;
            border-radius: 16px;
            background: #fff;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden;
        }

        .card-booking:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(51, 78, 172, 0.15);
        }

        .booking-header {
            background-color: var(--color-porcelain);
            padding: 15px 25px;
            border-bottom: 1px solid #e0e6ed;
        }

        .table-simple th {
            font-size: 0.75rem;
            text-transform: uppercase;
            color: var(--color-royal);
            letter-spacing: 1px;
            border-bottom: 2px solid var(--color-porcelain);
        }

        .table-simple td {
            font-size: 0.9rem;
            vertical-align: middle;
            padding: 12px 10px;
            color: var(--midnight);
        }

        .dashed-line {
            border-top: 2px dashed var(--color-sky);
            margin: 20px 0;
        }

        .pagination-modern {
            gap: 5px;
        }

        .pagination-modern .page-link {
            border: 1px solid var(--color-porcelain) !important;
            border-radius: 8px !important;
            padding: 6px 14px;
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--color-royal) !important;
            background-color: #fff !important;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.02);
            transition: all 0.2s ease;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            min-width: 35px;
            height: 35px;
        }

        .pagination-modern .page-link:hover {
            background-color: var(--color-dawn) !important;
            transform: translateY(-1px);
        }

        .pagination-modern .page-item.active .page-link {
            background-color: var(--color-royal) !important;
            color: var(--color-midnight) !important;
            border-color: var(--color-royal) !important;
            box-shadow: 0 4px 12px rgba(51, 78, 172, 0.3);
        }

        .pagination-modern .page-item.disabled .page-link {
            background-color: #f8f9fa !important;
            color: #ccc !important;
            cursor: not-allowed;
            box-shadow: none;
        }

        .btn-nav-text {
            padding-left: 15px !important;
            padding-right: 15px !important;
            width: auto !important;
        }
    </style>

    {{-- WRAPPER OFFSET (anti tenggelam) --}}
    <div class="page-offset">

        <div class="blob-bg" style="top: 100px; right: -200px;"></div>

        <div class="container" style="padding-bottom: 60px; color: var(--asian-pear)">

            <div class="row mb-5">
                <div class="col-md-8">
                    <h2 class="display-6 fw-bold" style="color: var(--royal)">Riwayat Booking</h2>
                    <p class="" style="color: var(--midnight)">Pantau status sewa dan riwayat pembayaran Anda.</p>
                </div>
            </div>

            <div class="row justify-content-center">

                {{-- SAMPLE CARD --}}
                <div class="col-lg-10 mb-5">
                    <div class="card card-booking">

                        <div class="booking-header d-flex justify-content-between align-items-center">
                            <span
                                class="badge rounded-pill bg-warning text-dark border border-warning bg-opacity-25 px-3 py-2">
                                <i class="fas fa-clock me-1"></i> Menunggu Pelunasan
                            </span>

                            <div class="fw-bold" style="color: var(--china); letter-spacing: 1px;">
                                #INV-2025-001
                            </div>
                        </div>

                        <div class="card-body p-4">
                            <div class="row g-4">

                                <div class="col-md-4">
                                    <img src="https://images.unsplash.com/photo-1598928506311-c55ded91a20c?auto=format&fit=crop&w=800&q=80"
                                        class="img-fluid rounded-3 mb-3 shadow-sm"
                                        style="width: 100%; height: 180px; object-fit: cover;" alt="Kamar">

                                    <h5 class="fw-bold mb-1" style="color: var(--color-midnight);">Kamar Standard</h5>
                                    <p class="text-muted small mb-0">
                                        <i class="fas fa-map-marker-alt me-1"></i> Kost Griya Cendana
                                    </p>
                                </div>

                                <div class="col-md-5 border-start-md ps-md-4">
                                    <h6 class="text-uppercase text-muted small fw-bold mb-3">Rincian Sewa</h6>

                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <small class="text-muted d-block">Check-in</small>
                                            <span class="fw-bold text-dark">01 Nov 2025</span>
                                        </div>
                                        <div class="col-6">
                                            <small class="text-muted d-block">Durasi</small>
                                            <span class="fw-bold text-dark">1 Tahun</span>
                                        </div>
                                    </div>

                                    <div class="mt-4 pt-2 border-top border-light">
                                        <small class="text-muted d-block mb-1">Total Tagihan</small>
                                        <h3 class="fw-bold text-dark mb-0">Rp 1.500.000</h3>
                                    </div>
                                </div>

                                <div class="col-md-3 text-md-end">
                                    <a href="#"
                                        class="btn btn-outline-secondary btn-royal-glow rounded-pill w-100 py-2">
                                        <i class="fas fa-wallet me-2"></i> Bayar Sekarang
                                    </a>
                                </div>
                            </div>

                            <div class="dashed-line"></div>

                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h6 class="fw-bold mb-0 small text-muted text-uppercase">
                                    <i class="fas fa-history me-2"></i> Riwayat Pembayaran Masuk
                                </h6>
                                <button class="btn btn-sm btn-outline-secondary rounded-pill px-3" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseHistory-1">
                                    <i class="fas fa-chevron-down small"></i> Lihat Detail
                                </button>
                            </div>

                            <div class="collapse" id="collapseHistory-1">
                                <div class="card card-body border-0 bg-light p-3 rounded-3">
                                    <div class="table-responsive">

                                        <table class="table table-simple table-hover mb-0" id="table-1">
                                            <thead>
                                                <tr>
                                                    <th>Tanggal</th>
                                                    <th>Keterangan</th>
                                                    <th>Metode</th>
                                                    <th class="text-end">Nominal</th>
                                                    <th class="text-center">Status</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <tr>
                                                    <td>01 Nov 2025</td>
                                                    <td>Booking Fee</td>
                                                    <td>BCA</td>
                                                    <td class="text-end fw-bold">Rp 500.000</td>
                                                    <td class="text-center"><span
                                                            class="badge bg-success bg-opacity-10 text-success">Lunas</span>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>05 Nov 2025</td>
                                                    <td>Pelunasan 1</td>
                                                    <td>QRIS</td>
                                                    <td class="text-end fw-bold">Rp 1.500.000</td>
                                                    <td class="text-center"><span
                                                            class="badge bg-success bg-opacity-10 text-success">Lunas</span>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>01 Des 2025</td>
                                                    <td>Perpanjangan 2</td>
                                                    <td>Mandiri</td>
                                                    <td class="text-end fw-bold">Rp 1.500.000</td>
                                                    <td class="text-center"><span
                                                            class="badge bg-success bg-opacity-10 text-success">Lunas</span>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>01 Jan 2026</td>
                                                    <td>Perpanjangan 3</td>
                                                    <td>BCA</td>
                                                    <td class="text-end fw-bold">Rp 1.500.000</td>
                                                    <td class="text-center"><span
                                                            class="badge bg-warning bg-opacity-10 text-dark">Pending</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>

                                    <nav class="d-flex justify-content-end mt-4">
                                        <ul class="pagination pagination-modern mb-0" id="pagin-1"></ul>
                                    </nav>
                                </div>
                            </div>
                        </div>

                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                simplePagination('table-1', 'pagin-1', 3);
                            });
                        </script>
                    </div>
                </div>

            </div>
        </div>

    </div> {{-- page-offset END --}}

    {{-- JAVASCRIPT LOGIC --}}
    <script>
        function simplePagination(tableId, paginId, rowsPerPage) {
            const table = document.getElementById(tableId);
            const pagin = document.getElementById(paginId);
            if (!table || !pagin) return;

            const tbody = table.querySelector('tbody');
            const rows = tbody.querySelectorAll('tr');
            const rowCount = rows.length;
            const pageCount = Math.ceil(rowCount / rowsPerPage);
            let currentPage = 1;

            function showPage(page) {
                const start = (page - 1) * rowsPerPage;
                const end = start + rowsPerPage;
                rows.forEach((row, index) => {
                    row.style.display = (index >= start && index < end) ? '' : 'none';
                });
            }

            const updateWidget = () => {
                pagin.innerHTML = '';

                if (pageCount <= 1) {
                    showPage(1);
                    return;
                }

                // Prev
                let liPrev = document.createElement('li');
                liPrev.className = `page-item ${currentPage === 1 ? 'disabled' : ''}`;
                liPrev.innerHTML = `<a class="page-link btn-nav-text">Previous</a>`;
                liPrev.onclick = () => {
                    if (currentPage > 1) {
                        currentPage--;
                        updateWidget();
                    }
                };
                pagin.appendChild(liPrev);

                // Numbers
                for (let i = 1; i <= pageCount; i++) {
                    let li = document.createElement('li');
                    li.className = `page-item ${currentPage === i ? 'active' : ''}`;
                    li.innerHTML = `<a class="page-link">${i}</a>`;
                    li.onclick = () => {
                        currentPage = i;
                        updateWidget();
                    };
                    pagin.appendChild(li);
                }

                // Next
                let liNext = document.createElement('li');
                liNext.className = `page-item ${currentPage === pageCount ? 'disabled' : ''}`;
                liNext.innerHTML = `<a class="page-link btn-nav-text">Next</a>`;
                liNext.onclick = () => {
                    if (currentPage < pageCount) {
                        currentPage++;
                        updateWidget();
                    }
                };
                pagin.appendChild(liNext);

                showPage(currentPage);
            };

            updateWidget();
        }
    </script>
@endsection
