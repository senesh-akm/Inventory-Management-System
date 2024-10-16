<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield("title", "My Demo Login")</title>

    {{-- Link the compiled CSS and JS using Vite --}}
    @vite(['resources/js/app.js', 'resources/sass/app.scss'])

    @stack('styles')
</head>
<body>
    @yield('content')

    @stack('scripts')
</body>
</html>
