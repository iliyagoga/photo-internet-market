<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{URL::asset('resources/css/admin.css')}}">
</head>
<body>
    <div class="adminpanel">
        <div class="menu">
            <a href="{{route('panel',['1'])}}">Товары</a>
            <a href="{{route('panel',['2'])}}">Категории</a>
            <a href="{{route('panel',['3'])}}">Характиристики товаров</a>
            <a href="{{route('panel',['4'])}}">Заказы</a>
            <a href="{{route('panel',['5'])}}">Пользователи</a>
        </div>
        <div class="context">
            @yield('context')
        </div>
    </div>
</body>
<script src="{{URL::asset('resources/js/admin.js')}}"></script>
