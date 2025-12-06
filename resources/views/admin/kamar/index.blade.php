<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Kamar - Admin SiKos</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">

                <!-- Header Section -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="fw-bold text-dark"><i class="fas fa-door-open me-2"></i>Manajemen Kamar</h2>
                </div>

                <!-- Feedback Messages -->
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Gagal Menyimpan!</strong>
                        <ul class="mb-0 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <!-- CARD 1: FORM TAMBAH DATA -->
                <div class="card shadow-sm border-0 mb-5">
                    <div class="card-header bg-primary text-white fw-bold py-3">
                        <i class="fas fa-plus-circle me-1"></i> Tambah Kamar Baru
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('admin.kamar.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-3">
                                <!-- No Kamar -->
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small">Nomor Kamar</label>
                                    <input type="text" name="no_kamar" class="form-control" placeholder="Contoh: A-101" required>
                                </div>

                                <!-- Harga -->
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small">Harga per Tahun</label>
                                    <div class="input-group">
                                        <span class="input-group-text">Rp</span>
                                        <input type="number" name="harga" class="form-control" placeholder="0" required min="0">
                                    </div>
                                </div>

                                <!-- Status -->
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small">Status Awal</label>
                                    <select name="status" class="form-select">
                                        <option value="tersedia">Tersedia</option>
                                        <option value="tidak tersedia">Tidak Tersedia</option>
                                    </select>
                                </div>

                                <!-- Foto -->
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small">Foto Kamar</label>
                                    <input type="file" name="foto_kamar" class="form-control" accept="image/*">
                                </div>

                                <!-- Deskripsi -->
                                <div class="col-12">
                                    <label class="form-label fw-bold small">Deskripsi Fasilitas</label>
                                    <textarea name="deskripsi_kamar" class="form-control" rows="3" placeholder="Contoh: AC, WiFi, Kamar Mandi Dalam..."></textarea>
                                </div>

                                <!-- Tombol Submit -->
                                <div class="col-12 text-end mt-3">
                                    <button type="submit" class="btn btn-primary px-4 fw-bold">
                                        <i class="fas fa-save me-1"></i> Simpan ke Cloud
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- CARD 2: TABEL DATA -->
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-white py-3">
                        <h5 class="mb-0 fw-bold text-dark">Daftar Kamar</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th class="px-4 py-3">Foto</th>
                                        <th class="py-3">Info Kamar</th>
                                        <th class="py-3">Harga</th>
                                        <th class="py-3">Status</th>
                                        <th class="px-4 py-3 text-end">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($kamar as $item)
                                    <tr>
                                        <td class="px-4">
                                            @if($item->foto_kamar)
                                                <!-- Image with Modal Trigger logic could be added here -->
                                                <img src="{{ Storage::disk('s3')->url($item->foto_kamar) }}"
                                                     alt="Foto Kamar"
                                                     class="img-thumbnail"
                                                     style="width: 80px; height: 60px; object-fit: cover;">
                                            @else
                                                <div class="bg-secondary text-white d-flex align-items-center justify-content-center rounded" style="width: 80px; height: 60px;">
                                                    <small>No Img</small>
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="fw-bold d-block text-dark">{{ $item->no_kamar }}</span>
                                            <small class="text-muted">{{ Str::limit($item->deskripsi_kamar, 30) }}</small>
                                        </td>
                                        <td class="fw-bold text-primary">
                                            Rp {{ number_format($item->harga, 0, ',', '.') }}
                                        </td>
                                        <td>
                                            @if($item->status == 'tersedia')
                                                <span class="badge bg-success bg-opacity-75 rounded-pill px-3">Tersedia</span>
                                            @else
                                                <span class="badge bg-danger bg-opacity-75 rounded-pill px-3">Penuh</span>
                                            @endif
                                        </td>
                                        <td class="px-4 text-end">
                                            <!-- Tombol Edit (Dummy Link) -->
                                            <a href="{{ route('admin.kamar.show', $item->id_kamar) }}" class="btn btn-sm btn-outline-info me-1" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <!-- Form Delete -->
                                            <form action="{{ route('admin.kamar.destroy', $item->id_kamar) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus kamar {{ $item->no_kamar }}? Data tidak bisa dikembalikan.');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-5 text-muted">
                                            <i class="fas fa-box-open fa-3x mb-3 d-block"></i>
                                            Belum ada data kamar.
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
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
