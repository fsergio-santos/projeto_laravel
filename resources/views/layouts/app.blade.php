<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('lib/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/css/bootstrap/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/css/bootstrap/responsive.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/css/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

</head>
<body class="app sidebar-mini rtl">
   
        <header>
            @include('layouts.header')
        </header>

        <aside>
            @include('layouts.sidebar')
        </aside>    

        <main class="app-content">
            @yield('content')
        </main>

         <script src="{{ asset('lib/js/jquery/jquery-3.4.1.js') }}" ></script>
         <script src="{{ asset('lib/js/popper.min.js') }}" ></script>
         <script src="{{ asset('lib/js/bootstrap.min.js') }}" ></script>
         <script src="{{ asset('lib/js/main.js') }}" ></script>
         <script src="{{ asset('lib/js/plugins/pace.min.js') }}" ></script>
         <script src="{{ asset('lib/js/plugins/moment.min.js') }}" ></script>
         <script src="{{ asset('lib/js/dataTable/jquery.dataTables.min.js') }}" ></script>
         <script src="{{ asset('lib/js/dataTable/dataTables.responsive.min.js') }}" ></script>
         <script src="{{ asset('lib/js/dataTable/dataTables.bootstrap4.min.js') }}" ></script>
         <script src="{{ asset('lib/js/dataTable/responsive.bootstrap.min.js') }}" ></script>
         <script src="{{ asset('lib/js/dataTable/dataTables.select.min.js') }}" ></script>


         @yield('javascript')

        </div>
</body>
</html>
