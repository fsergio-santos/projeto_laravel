<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('lib/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/css/font-awesome/css/font-awesome.css') }}" rel="stylesheet">

</head>
<body app rtl>
    
    <header>
        @include('layouts.sec_header')
    </header>

    <main class="sec-content">
       @yield('content')
    </main>
   
     <!-- Scripts -->
    <script src="{{ asset('lib/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('lib/js/popper.min.js') }}" ></script>
    <script src="{{ asset('lib/js/bootstrap.min.js') }}" ></script>
    <script src="{{ asset('lib/js/main.js') }}" ></script>
    <script src="{{ asset('lib/js/plugins/pace.min.js') }}" ></script>

</body>
</html>
