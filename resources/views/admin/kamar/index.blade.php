<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Kamar - Admin SiKos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <style>
        /* Modern Dashboard Vibes */
        .page-header {
            background: linear-gradient(135deg, #4f8dfb 0%, #2563eb 100%);
            border-radius: 16px;
            padding: 32px;
            color: white;
        }

        .card-modern {
            border-radius: 14px;
            border: none;
            box-shadow: 0 8px 18px rgba(0,0,0,0.06);
        }

        .table-modern tbody tr:hover {
            background: #f7faff !important;
        }

        .img-thumb {
            width: 85px;
            height: 65px;
            border-radius: 10px;
            object-fit: cover;
        }

        .badge-soft {
            padding: 6px 14px;
            border-radius: 30px;
            font-size: 0.75rem;
        }

        .form-label {
            font-weight: 600;
            font-size: 0.85rem;
        }
    </style>
</head>
<body class="bg-light">

<div class="container py-5">

    <!-- HERO HEADER -->
    <div class="page-header mb-5 shadow-sm">
        <h2 class="fw-bold mb-1"><i class="fas fa-door-open me-2"></i> Manajemen Kamar</h2>
        <p class="mb-0 opacity-75">Kelola data kamar, harga, dan status ketersediaan dengan mudah.</p>
    </div>

    <!-- ALERTS -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show shadow-sm">
            <strong>Terjadi Kesalahan!</strong>
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row g-4">

        <!-- FORM TAMBAH KAMAR -->
        <div class="col-lg-4">
            <div class="card card-modern">
                <div class="card-header bg-white fw-bold py-3 border-0">
                    <i class="fas fa-plus-circle me-2 text-primary"></i> Tambah Kamar Baru
                </div>

                <div class="card-body px-4 pb-4">
                    <form action="{{ route('admin.kamar.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <label class="form-label">Nomor Kamar</label>
                        <input type="text" name="no_kamar" class="form-control mb-3" placeholder="Contoh: A-101" required>

                        <label class="form-label">Harga per Tahun</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Rp</span>
                            <input type="number" name="harga" class="form-control" placeholder="0" required min="0">
                        </div>

                        <label class="form-label">Status Awal</label>
                        <select name="status" class="form-select mb-3">
                            <option value="tersedia">Tersedia</option>
                            <option value="tidak tersedia">Tidak Tersedia</option>
                        </select>

                        <label class="form-label">Foto Kamar</label>
                        <input type="file" name="foto_kamar" class="form-control mb-3">

                        <label class="form-label">Deskripsi Fasilitas</label>
                        <textarea name="deskripsi_kamar" class="form-control mb-4" rows="3" placeholder="AC, WiFi, Kamar mandi dalam..."></textarea>

                        <button class="btn btn-primary w-100 fw-bold py-2">
                            <i class="fas fa-cloud-upload-alt me-2"></i>Simpan Data
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- TABEL KAMAR -->
        <div class="col-lg-8">
            <div class="card card-modern">
                <div class="card-header bg-white fw-bold py-3 border-0">
                    Daftar Kamar Tersedia
                </div>

                <div class="table-responsive">
                    <table class="table table-modern align-middle mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="px-4 py-3">Foto</th>
                                <th>Informasi</th>
                                <th>Harga</th>
                                <th>Status</th>
                                <th class="px-4 text-end">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                        @forelse($kamar as $item)
                            <tr>
                                <td class="px-4">
                                    @if($item->foto_kamar)
                                        <img src="{{ Storage::disk('s3')->url($item->foto_kamar) }}"
                                             class="img-thumb" alt="Foto">
                                    @else
                                        <div class="bg-secondary text-white d-flex justify-content-center align-items-center rounded"
                                             style="width:85px;height:65px;">No Img</div>
                                    @endif
                                </td>

                                <td>
                                    <div class="fw-bold">{{ $item->no_kamar }}</div>
                                    <small class="text-muted">{{ Str::limit($item->deskripsi_kamar, 35) }}</small>
                                </td>

                                <td class="fw-bold text-primary">
                                    Rp {{ number_format($item->harga,0,',','.') }}
                                </td>

                                <td>
                                    @if($item->status == 'tersedia')
                                        <span class="badge bg-success badge-soft">Tersedia</span>
                                    @else
                                        <span class="badge bg-danger badge-soft">Tidak Tersedia</span>
                                    @endif
                                </td>

                                <td class="px-4 text-end">
                                    <a href="{{ route('admin.kamar.show', $item->id_kamar) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <form action="{{ route('admin.kamar.destroy', $item->id_kamar) }}"
                                          method="POST" class="d-inline"
                                          onsubmit="return confirm('Hapus kamar {{ $item->no_kamar }}?');">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center py-5" colspan="5">
                                    <i class="fas fa-box-open fa-3x text-secondary mb-3"></i>
                                    <div class="text-muted">Belum ada data kamar.</div>
                                </td>
                            </tr>
                        @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

</body>
</html>
