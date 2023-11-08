<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @yield('title')
    </title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('font/css/all.css')}}">
</head>

<body>
    @include('layouts.header')
    @yield('main')

    <script src="{{asset('js/bootstrap.bundle.js')}}"></script>
    <script src="{{asset('js/all.js')}}"></script>
</body>

</html>