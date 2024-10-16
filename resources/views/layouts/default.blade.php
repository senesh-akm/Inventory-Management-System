<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield("title", "My Demo Login")</title>

    {{-- Link the compiled Bootstrap CSS --}}
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    {{-- Additional styles can be added later using @stack --}}
    @stack('styles')
  </head>
  <body>
    {{-- Content section for the Blade template --}}
    @yield("content")

    {{-- Link the compiled Bootstrap JS --}}
    <script src="{{ mix('js/app.js') }}"></script>

    {{-- Additional scripts can be added later using @stack --}}
    @stack('scripts')
  </body>
</html>
