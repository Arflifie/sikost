<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Detail Keluhan</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
:root{
    --primary:#334EAC;
    --secondary:#7096D1;
    --soft:#BAD6EB;
    --light:#EDF1F6;
    --dark:#081F5C;
    --text:#020617;
}

/* ===== BACKGROUND ===== */
body{
    font-family:"Segoe UI",sans-serif;
    background:
        radial-gradient(circle at 15% 10%, var(--soft), transparent 35%),
        radial-gradient(circle at 85% 85%, var(--secondary), transparent 40%),
        linear-gradient(135deg, #f6f8fc, var(--light));
    min-height:100vh;
}

/* ===== SIDEBAR ===== */
.sidebar{
    width:260px;
    height:100vh;
    position:fixed;
    background:linear-gradient(180deg,var(--dark),#050e2d);
    padding:60px 30px;
    color:#fff;
    box-shadow:8px 0 30px rgba(0,0,0,.35);
}

.sidebar-title{
    font-size:38px;
    font-weight:900;
    letter-spacing:1px;
}
.sidebar-title::after{
    content:"";
    width:70px;
    height:5px;
    background:var(--secondary);
    display:block;
    margin-top:18px;
    border-radius:999px;
}

/* INFO PANEL */
.sidebar-info{
    margin-top:28px;
    background:rgba(255,255,255,0.08);
    border:1px solid rgba(255,255,255,0.15);
    border-radius:18px;
    padding:18px;
    font-size:14px;
}
.sidebar-info strong{
    display:block;
    font-size:13px;
    margin-bottom:4px;
}
.sidebar-info span{
    color:rgba(255,255,255,0.75);
}

/* FOOTER */
.sidebar-footer{
    position:absolute;
    bottom:30px;
    left:30px;
    right:30px;
}
.btn-logout{
    width:100%;
    background:rgba(255,255,255,0.08);
    border:1px solid rgba(255,255,255,0.25);
    color:#fff;
    padding:14px 0;
    border-radius:18px;
    font-weight:700;
    font-size:16px;
}
.btn-logout:hover{
    background:rgba(255,255,255,0.18);
    color:#fff;
}

/* ===== CONTENT ===== */
.content{
    margin-left:260px;
    padding:70px 90px;
    max-width:1600px;
}

/* HEADER */
.page-header{
    display:flex;
    justify-content:space-between;
    align-items:flex-end;
    margin-bottom:40px;
}
.page-title{
    font-size:42px;
    font-weight:900;
    color:var(--dark);
}
.page-sub{
    font-size:15px;
    color:#64748b;
}

/* DETAIL CARD */
.detail-card{
    background:linear-gradient(180deg,#ffffff,var(--light));
    border-radius:30px;
    padding:40px;
    box-shadow:0 18px 40px rgba(0,0,0,.12);
}

/* INFO */
.info-label{
    font-size:14px;
    color:#6b7280;
    margin-bottom:4px;
}
.info-value{
    font-size:20px;
    font-weight:800;
    color:var(--text);
}

/* IMAGE */
.img-preview{
    width:100%;
    max-height:420px;
    object-fit:cover;
    border-radius:26px;
    box-shadow:0 18px 35px rgba(0,0,0,.18);
    cursor:pointer;
}

/* EMPTY IMAGE */
.empty-image{
    height:260px;
    border-radius:26px;
    background:repeating-linear-gradient(
        45deg,
        #e5e7eb,
        #e5e7eb 12px,
        #f3f4f6 12px,
        #f3f4f6 24px
    );
    display:flex;
    align-items:center;
    justify-content:center;
    color:#6b7280;
    font-weight:600;
}

/* FORM */
.form-select, .form-control{
    border-radius:16px;
    font-size:16px;
}
.btn-save{
    background:linear-gradient(135deg,var(--primary),var(--secondary));
    border:none;
    border-radius:18px;
    padding:14px 36px;
    font-size:18px;
    font-weight:800;
    color:white;
}

/* RESPONSIVE */
@media(max-width:991px){
    .sidebar{
        width:100%;
        height:auto;
        position:relative;
        text-align:center;
    }
    .sidebar-footer{
        position:relative;
        margin-top:30px;
    }
    .content{
        margin-left:0;
        padding:35px 22px;
    }
    .page-title{
        font-size:30px;
    }
}
</style>
</head>

<body>

<!-- SIDEBAR -->
<aside class="sidebar">

    <div class="sidebar-title">🛠 Petugas</div>
    <div class="text-white-50 mt-2" style="font-size:14px;">
        Sistem Keluhan Kos
    </div>

    <div class="sidebar-info">
        <strong>Peran</strong>
        <span>Petugas Kos</span>

        <strong class="mt-3">Akses</strong>
        <span>Monitoring & Penanganan Keluhan</span>
    </div>

    <div class="sidebar-footer">
        <a href="#" class="btn btn-logout">🚪 Logout</a>
    </div>

</aside>

<!-- CONTENT -->
<section class="content">

    <div class="page-header">
        <div>
            <div class="page-title">Detail Keluhan</div>
            <div class="page-sub">Informasi lengkap laporan warga</div>
        </div>
        <a href="/petugas/keluhan" class="btn btn-secondary fw-bold rounded-pill px-4">
            ⬅ Kembali
        </a>
    </div>

    <div class="detail-card">

        <div class="row g-4 mb-4">
            <div class="col-md-6">
                <div class="info-label">Judul Keluhan</div>
                <div class="info-value">{{ $keluhan->judul_keluhan }}</div>
            </div>

            <div class="col-md-6">
                <div class="info-label">No Kamar</div>
                <div class="info-value">{{ $keluhan->no_kamar }}</div>
            </div>

            <div class="col-md-6">
                <div class="info-label">Tanggal & Waktu</div>
                <div class="info-value">
                    {{ $keluhan->tanggal_keluhan ?? '-' }} {{ $keluhan->waktu_keluhan ?? '' }}
                </div>
            </div>

            <div class="col-md-6">
                <div class="info-label">Status</div>
                <span class="badge
                    @if($keluhan->status=='Pending') bg-danger
                    @elseif($keluhan->status=='Diproses') bg-warning text-dark
                    @else bg-success @endif
                    px-3 py-2 fs-6">
                    {{ $keluhan->status }}
                </span>
            </div>

            <div class="col-12">
                <div class="info-label">Deskripsi Keluhan</div>
                <div class="info-value">{{ $keluhan->deskripsi_keluhan }}</div>
            </div>
        </div>

        <div class="row g-4 mb-4">
            <div class="col-md-6">
                <div class="info-label mb-2">Foto Bukti</div>
                @if($keluhan->foto_bukti)
                    <img src="{{ asset('storage/'.$keluhan->foto_bukti) }}"
                         class="img-preview"
                         onclick="window.open(this.src)">
                @else
                    <div class="empty-image">Tidak ada foto bukti</div>
                @endif
            </div>

            <div class="col-md-6">
                <div class="info-label mb-2">Foto Setelah Perbaikan</div>
                @if($keluhan->foto_after_perbaikan)
                    <img src="{{ asset('storage/'.$keluhan->foto_after_perbaikan) }}"
                         class="img-preview"
                         onclick="window.open(this.src)">
                @else
                    <div class="empty-image">Belum ada foto</div>
                @endif
            </div>
        </div>

        <hr class="my-4">

        <form method="POST" enctype="multipart/form-data" class="d-flex flex-wrap gap-3">
            @csrf
            <select class="form-select w-auto">
                <option {{ $keluhan->status=='Pending' ? 'selected' : '' }}>Pending</option>
                <option {{ $keluhan->status=='Diproses' ? 'selected' : '' }}>Diproses</option>
                <option {{ $keluhan->status=='Selesai' ? 'selected' : '' }}>Selesai</option>
            </select>

            <input type="file" class="form-control w-auto">

            <button class="btn btn-save">Simpan Perubahan</button>
        </form>

    </div>

</section>

</body>
</html>
