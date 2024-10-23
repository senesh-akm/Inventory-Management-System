<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield("title", "My Demo Login")</title>

    {{-- Font Awesome and Chart.js scripts --}}
    <script src="https://kit.fontawesome.com/b4bcada09d.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    {{-- Link the Bootstrap Icons CDN --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.0/font/bootstrap-icons.min.css" rel="stylesheet">

    {{-- Link the compiled CSS and JS using Vite --}}
    @vite(['resources/js/app.js', 'resources/sass/app.scss'])

    {{-- Additional CSS if required --}}
    @stack('styles')
</head>
<body>
    @include('partials.top-navbar')

    {{-- Content Section --}}
    <main class="py-4">
        @yield('content')
    </main>

    {{-- Footer (Optional) --}}
    <footer class="text-center py-4">
        <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
    </footer>

    {{-- Additional Scripts if required --}}
    @stack('scripts')
</body>
</html>
