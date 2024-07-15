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
@include('components.navbar')

<div class="container-fluid">
    <div class="row">
        @include('components.sidebar')

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 my-sm-3 my-2 position-relative" id="pm__main">
            <div class="d-flex align-items-center" id="pm__toolbar">
                @yield("heading")
            </div>

            <hr/>

            @include("components.status")

            @yield('content')
        </main>
    </div>
</div>

</body>
</html>
