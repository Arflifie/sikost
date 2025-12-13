<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Keluhan Petugas</title>

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

/* CARD */
.card-keluhan{
    background:linear-gradient(180deg,#ffffff,var(--light));
    border-radius:30px;
    padding:34px;
    min-height:320px;
    display:flex;
    flex-direction:column;
    box-shadow:0 18px 40px rgba(0,0,0,.12);
    transition:.3s;
}
.card-keluhan:hover{
    transform:translateY(-6px);
    box-shadow:0 24px 50px rgba(0,0,0,.18);
}

.card-title{
    font-size:22px;
    font-weight:800;
    color:var(--text);
}
.card-label{
    font-size:14px;
    color:#6b7280;
    margin-top:12px;
}
.card-value{
    font-size:20px;
    font-weight:700;
    color:#020617;
}

.btn-detail{
    background:linear-gradient(135deg,var(--primary),var(--secondary));
    border:none;
    border-radius:18px;
    padding:14px;
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
        <div class="page-title">Daftar Keluhan</div>
        <div class="page-sub">
            Keluhan yang masuk dan perlu ditindaklanjuti oleh petugas
        </div>
    </div>

    <div class="row g-4">
        @foreach($keluhan as $k)
        <div class="col-xl-4 col-lg-6">
            <div class="card-keluhan">

                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div class="card-title">{{ $k->judul_keluhan }}</div>
                    <span class="badge
                        @if($k->status=='Pending') bg-danger
                        @elseif($k->status=='Diproses') bg-warning text-dark
                        @else bg-success @endif">
                        {{ $k->status }}
                    </span>
                </div>

                <div class="card-label">No Kamar</div>
                <div class="card-value">{{ $k->no_kamar }}</div>

                <div class="card-label">Tanggal Laporan</div>
                <div class="card-value">
                    {{ $k->tanggal_keluhan ?? '-' }} {{ $k->waktu_keluhan ?? '' }}
                </div>

                <div class="mt-auto pt-4">
                    <a href="/petugas/keluhan/{{ $k->id }}"
                       class="btn btn-detail w-100">
                        Lihat Detail
                    </a>
                </div>

            </div>
        </div>
        @endforeach
    </div>

</section>

</body>
</html>
