<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Namaa</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css','resources/sass/app.scss', 'resources/js/app.js' ])
</head>
<body>
<div id="app">
    @include('admin.layouts.header')
    <div class="container-fluid vh-100">
        <div class="row">
            @include('admin.layouts.aside')
            <div class="py-3 col-10">
                @yield('content')
            </div>
        </div>

    </div>
</div>
@stack('scripts')
</body>
</html>
