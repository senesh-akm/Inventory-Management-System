<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield("title", "My Demo Login")</title>

    {{-- Font Awesome and Chart.js scripts --}}
    <script src="https://kit.fontawesome.com/b4bcada09d.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    {{-- Compiled Bootstrap CSS --}}
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    {{-- Additional styles --}}
    @stack('styles')
</head>
<body>
    <div class="container">
        {{-- @include('partials.left-navbar') --}}
        @yield('content')
    </div>

    {{-- Compiled Bootstrap JS --}}
    <script src="{{ mix('js/app.js') }}"></script>

    {{-- Additional scripts --}}
    @stack('scripts')
</body>
</html>
