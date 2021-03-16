<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <title>TheSaaS — Blog with list style layout</title>

    <!-- Styles -->
    <link href="{{ asset('css/page.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{ asset('/img/apple-touch-icon.png') }}">
    <link rel="icon" href="{{ asset('/img/favicon.png') }}">
</head>

<body>

@yield('content')

<!-- Scripts -->
<script src="{{ asset('js/theme/page.js') }}"></script>
<script src="{{ asset('js/theme/script.js') }}"></script>

</body>
</html>
