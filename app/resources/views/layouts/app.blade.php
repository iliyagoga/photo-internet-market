<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="{{URL::asset('resources/css/main.css')}}">
    <link rel="stylesheet" href="{{URL::asset('resources/css/meanpage.css')}}">
    <link rel="stylesheet" href="{{URL::asset('resources/css/news.css')}}">
    <link rel="stylesheet" href="{{URL::asset('resources/css/product.css')}}">
    <link rel="stylesheet" href="{{URL::asset('resources/css/catalog.css')}}">
    <link rel="stylesheet" href="{{URL::asset('resources/css/register.css')}}">
    <link rel="stylesheet" href="{{URL::asset('resources/css/login.css')}}">
    <link rel="stylesheet" href="{{URL::asset('resources/css/profile.css')}}">
    <link rel="stylesheet" href="{{URL::asset('resources/css/cart.css')}}">
</head>
<body>
    <div id="app">
        <header>
            <div class="header">
                <div class="left">
                    <div class="burger">
                        <img src="{{URL::asset('assets/png/menu.png')}}" alt="">
                    </div>
                    <div class="logo">
                        <img src="{{URL::asset('assets/png/logo.png')}}" alt="">
                    </div>
                </div>
                <div class="right">
                    <div class="phone_block">
                        <a href="tel:+79991112233">+7-999-111-22-33</a>
                        <span>Круглосуточно</span>
                    </div>
                    <div class="icons_panel">
                        <div class="favs">
                            <span class="count">0</span>
                            <img src="{{URL::asset('assets/svg/star.svg')}}" alt="">
                        </div>
                        <div class="compare">
                            <span class="count">0</span>
                            <img src="{{URL::asset('assets/svg/compare.svg')}}" alt="">
                        </div>
                        <div class="shopping-cart">
                            <span class="count">0</span>
                            <img src="{{URL::asset('assets/svg/shopping-cart.svg')}}" alt="">
                        </div>
                    </div>
                    <div class="dop">
                        <div class="search">
                            <img src="{{URL::asset('assets/svg/search.svg')}}" alt="">
                        </div>
                        @if (Auth::check())
                        <div class="user">
                            <a href="{{route('profile')}}"><img src="{{URL::asset('assets/svg/user.svg')}}" alt=""></a>
                        </div>
                        @else
                        <div class="logn">
                            <a href="{{route('login')}}">Войти</a>
                        </div>
                
                        @endif
                       
                    </div>
                </div>
            </div>
        </header>
        @yield('content')
    <footer>
        <div class="footer">
            <div class="main_info">
                <img src="{{URL::asset('assets/png/logo.png')}}" alt="">
                <p>Самый удобный в Москве сервис  
                    <br>
                аренды фото, видео и кинотехники</p>
                <span>© 2015 – 2019 Fotoprokat 24</span>
            </div>
            <div class="s">
                <div class="social">
                    <a href="#"> <img src="{{URL::asset('assets/svg/001-facebook.svg')}}" alt=""></a>
                    <a href="#"> <img src="{{URL::asset('assets/svg/002-twitter.svg')}}" alt=""></a>
                    <a href="#"> <img src="{{URL::asset('assets/svg/003-vk.svg')}}" alt=""></a>
                    <a href="#"> <img src="{{URL::asset('assets/svg/004-youtube.svg')}}" alt=""></a>
                    <a href="#"><img src="{{URL::asset('assets/svg/005-instagram.svg')}}" alt=""></a>
                </div>
                <a href='#'>Политика конфиденциальности</a>
            </div>
            <div class="address">
                <a href="tel:+79991112233">+7-999-111-22-33</a>
                <span>г. Москва, пр Челюскинцев, дом 8</span>
            </div>
            <div class="payments">
                <img src="{{URL::asset('assets/svg/visa.svg')}}" alt="">
                <img src="{{URL::asset('assets/svg/mastercard.svg')}}" alt="">
                <img class="kassa" src="{{URL::asset('assets/svg/robokassa.svg')}}" alt="">
            </div>
        </div>
    </footer>
    </div>
</body>
</html>
