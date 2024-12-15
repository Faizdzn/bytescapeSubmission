<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EduPoint | {{$nav ?? "Tempat kumpul belajarmu"}}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gabarito:wght@400..900&display=swap" rel="stylesheet">

    <!-- Styles / Scripts -->
    {{-- <link href="/css/main.css" rel="stylesheet" /> --}}
    <script src="/js/main.js"></script>
    <script src="/js/service.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css" />
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css'])
        <script src="https://cdn.tailwindcss.com"></script> 
    @else
        <script src="https://cdn.tailwindcss.com"></script> 
    @endif
</head>
<body>
    @yield('bar')
</body>
</html>

{{-- <script>
    yield('script')
</script> --}}