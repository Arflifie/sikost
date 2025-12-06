<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test API Tagihan</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        .box { border: 1px solid #ccc; padding: 15px; margin-bottom: 20px; border-radius: 8px; }
        button { padding: 8px 15px; cursor: pointer; }
        input { padding: 6px; width: 100%; margin-top: 5px; margin-bottom: 10px; }
        .title { font-size: 18px; font-weight: bold; margin-bottom: 10px; }
    </style>
</head>
<body>

<h2>Halaman Pengujian API Tagihan</h2>

{{-- ======================= POST /tagihan ======================= --}}
<div class="box">
    <div class="title">1. Test POST /tagihan</div>

    <form action="/tagihan" method="POST">
        @csrf

        <label>Booking ID</label>
        <input type="number" name="booking_id" required>

        <label>Total Pembayaran</label>
        <input type="number" name="total_pembayaran" required>

        <label>Metode Pembayaran</label>
        <input type="text" name="metode_pembayaran">

        <label>Jenis Pembayaran</label>
        <input type="text" name="jenis_pembayaran">

        <button type="submit">Kirim Pembayaran</button>
    </form>
</div>


{{-- ======================= GET /tagihan ======================= --}}
<div class="box">
    <div class="title">2. Test GET /tagihan (History Penyewa)</div>

    <a href="/tagihan">
        <button type="button">Cek History</button>
    </a>
</div>


{{-- ======================= GET /admin/tagihan ======================= --}}
<div class="box">
    <div class="title">3. Test GET /admin/tagihan (Admin)</div>

    <a href="/admin/tagihan">
        <button type="button">Cek Laporan Admin</button>
    </a>
</div>


{{-- ======================= GET /pemilik/tagihan ======================= --}}
<div class="box">
    <div class="title">4. Test GET /pemilik/tagihan (Pemilik)</div>

    <a href="/pemilik/tagihan">
        <button type="button">Cek Laporan Pemilik</button>
    </a>
</div>

</body>
</html>
