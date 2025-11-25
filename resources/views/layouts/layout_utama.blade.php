<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page - Laravel Palette</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        /* Paste CSS dari langkah 1 di sini jika malas buat file style.css */
    </style>
</head>

<body>

    @include('layouts.navbar')

    <main>
        @yield('content')
    </main>

    <footer class="bg-midnight text-white py-4 mt-5">
        <div class="container text-center">
            <p class="mb-0">© 2025 Created with Laravel & Bootstrap.</p>
            <small style="color: var(--color-china)">Designed with custom color palette.</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000, // Durasi animasi 1 detik
            once: true, // Animasi hanya berjalan sekali saat scroll
            offset: 100 // Offset trigger
        });
    </script>
</body>

</html>
