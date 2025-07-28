<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'LabSistem')</title>

    {{-- Tetap memuat CSS & JS utama dari Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/auth.css'])

    {{-- Memuat ikon Bootstrap --}}
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    {{-- Langsung render konten tanpa sidebar atau wrapper --}}
    @yield('content')
</body>
</html>