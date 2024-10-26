<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'My Demo Login')</title>

    {{-- Chart.js script --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    {{-- Link the Bootstrap Icons CDN --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    {{-- Link the compiled CSS and JS using Vite --}}
    @vite(['resources/js/app.js', 'resources/sass/app.scss'])

    {{-- Additional CSS if required --}}
    @stack('styles')
</head>
<body>
    {{-- Include the top navigation bar --}}
    @include('partials.top-navbar')

    <div class="container-fluid">
        <div class="row">
            {{-- Include the sidebar --}}
            <div class="col-md-4 col-lg-2 d-none d-md-block">
                @include('partials.side-navbar')
                <!-- Toggle Button -->
                <button class="navbar-toggler d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>

            {{-- Main Content Area --}}
            <main class="col-md-8 ms-sm-auto col-lg-10 px-md-4">
                @yield('content')
            </main>
        </div>
    </div>

    {{-- Footer (Optional) --}}
    <footer class="text-center py-4">
        <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
    </footer>

    {{-- Additional Scripts if required --}}
    @stack('scripts')
</body>
</html>
