<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#F7F7F8] flex">

    <!-- SIDEBAR -->
    <aside class="w-64 h-screen bg-[#0F172A] text-white flex flex-col py-6">
        <h2 class="text-2xl font-bold text-center mb-10">Sikost Admin</h2>

        <nav class="flex flex-col gap-3 px-4">

            <!-- ACTIVE MENU -->
            <a href="#" class="px-4 py-2 rounded-lg bg-[#0465BB]">Dashboard</a>

            <a href="#" class="px-4 py-2 rounded-lg hover:bg-[#151B23]">Manajemen Kamar</a>
            <a href="#" class="px-4 py-2 rounded-lg hover:bg-[#151B23]">Manajemen Pembayaran</a>
            <a href="#" class="px-4 py-2 rounded-lg hover:bg-[#151B23]">Keluhan</a>
            <a href="#" class="px-4 py-2 rounded-lg hover:bg-[#151B23]">Pelaporan</a>
        </nav>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="flex-1 p-8">

        <!-- TOPBAR -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-semibold text-[#151B23]">Dashboard Admin</h1>
            <div class="flex items-center gap-4">
                <span class="text-[#151B23]">Halo, Admin</span>
                <img src="https://ui-avatars.com/api/?name=Admin" class="w-10 h-10 rounded-full">
            </div>
        </div>

        <!-- SUMMARY CARDS -->
        <div class="grid grid-cols-4 gap-6 mb-8">

            <div class="p-6 bg-white rounded-xl shadow hover:shadow-lg transition border border-[#E5E7EB]">
                <h3 class="text-sm text-[#C4C7D0]">Total Kamar</h3>
                <p class="text-2xl font-bold mt-2 text-[#151B23]">24</p>
            </div>

            <div class="p-6 bg-white rounded-xl shadow hover:shadow-lg transition border border-[#E5E7EB]">
                <h3 class="text-sm text-[#C4C7D0]">Pembayaran Bulan Ini</h3>
                <p class="text-2xl font-bold mt-2 text-[#151B23]">Rp 12.300.000</p>
            </div>

            <div class="p-6 bg-white rounded-xl shadow hover:shadow-lg transition border border-[#E5E7EB]">
                <h3 class="text-sm text-[#C4C7D0]">Keluhan Aktif</h3>
                <p class="text-2xl font-bold mt-2 text-[#151B23]">5</p>
            </div>

            <div class="p-6 bg-white rounded-xl shadow hover:shadow-lg transition border border-[#E5E7EB]">
                <h3 class="text-sm text-[#C4C7D0]">Laporan Masuk</h3>
                <p class="text-2xl font-bold mt-2 text-[#151B23]">8</p>
            </div>
        </div>

        <!-- SECTION GRAFIK -->
        <div class="p-6 bg-white rounded-xl shadow border border-[#E5E7EB]">
            <h3 class="text-lg font-semibold mb-4 text-[#151B23]">Statistik Penghuni (Placeholder)</h3>
            <div class="w-full h-64 bg-[#C4C7D0] rounded flex items-center justify-center text-white">
                Grafik akan ditempatkan di sini
            </div>
        </div>

    </main>

</body>
</html>
