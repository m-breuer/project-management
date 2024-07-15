<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" translate="no">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Project Management Tool') }}</title>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div class="container-fluid">
        <div class="d-flex align-items-center" id="pm__toolbar">
            @yield('heading')
        </div>

        @include('components.status')
        <main class="vh-100 d-flex align-items-center flex-row" id="pm__main">
            @yield('content')
        </main>
    </div>
</body>

</html>
