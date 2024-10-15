<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="{{URL::asset('resources/css/breadcrumbs.css')}}">
    <link rel="stylesheet" href="{{URL::asset('resources/css/main.css')}}">
    <link rel="stylesheet" href="{{URL::asset('resources/css/meanpage.css')}}">
    <link rel="stylesheet" href="{{URL::asset('resources/css/news.css')}}">
    <link rel="stylesheet" href="{{URL::asset('resources/css/product.css')}}">
    <link rel="stylesheet" href="{{URL::asset('resources/css/catalog.css')}}">
    <link rel="stylesheet" href="{{URL::asset('resources/css/register.css')}}">
    <link rel="stylesheet" href="{{URL::asset('resources/css/login.css')}}">
    <link rel="stylesheet" href="{{URL::asset('resources/css/profile.css')}}">
    <link rel="stylesheet" href="{{URL::asset('resources/css/cart.css')}}">
    <link rel="stylesheet" href="{{URL::asset('resources/css/preorder.css')}}">
    <link rel="stylesheet" href="{{URL::asset('resources/css/categories.css')}}">
    <link rel="stylesheet" href="{{URL::asset('resources/css/elect.css')}}">
</head>
<body>
    <div id="app">
        <header>
            <div class="header">
                <div class="left">
                    <img class="burger" src="{{URL::asset('assets/png/menu.png')}}" alt="">
                    <div class="logo">
                        <a href="{{url('/')}}">
                            <img src="{{URL::asset('assets/png/logo.png')}}" alt="">
                        </a>
                    
                    </div>
                    <div class="list-menu hidden">
                        <div class="l-l">
                            @php
                            use App\Models\Category;
                            $c=0;
                            @endphp
                            <ul>
                                <li class="cat">
                                    <a href="{{route('catalog',[1,1])}}">Каталог</a>
                                </li>
                            @foreach (Category::get() as $category)
                                <li>
                                    @if ($c<5)
                                    <a href="{{route('category',[$category->name,1,1])}}">{{$category->value}}</a>
                                    @endif
                                    @php
                                    $c++;
                                    @endphp
                              
                                </li>
                            @endforeach
                            <li>
                            <a class="more" href="{{route('categories')}}">Смотреть еще категории</a>
                            </li>
                            </ul>
                          
                        </div>
                        <div class="l-r">
                            <ul>
                                <li>
                                    <a href="#">Как это работает</a>
                                </li>
                                <li>
                                    <a href="#">Правила аренды</a>
                                </li>
                                <li>
                                    <a href="#">Доставка и оплата</a>
                                </li>
                                <li>
                                    <a href="#">Вопросы и ответы</a>
                                </li>
                                <li>
                                    <a href="#">О компании</a>
                                </li>
                                <li>
                                    <a href="#">Новости</a>
                                </li>
                                <li>
                                    <a href="#">Сотрудничество</a>
                                </li>
                                <li>
                                    <a href="#">Договор оферты</a>
                                </li>
                                <li>
                                    <a href="#">Контакты</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="center">
                    <div>
                        <a href="{{route('catalog',[1,1])}}">Каталог</a>
                    </div>

                    <div>
                        <a href="#">О компании</a>
                    </div>

                    <div>
                        <a href="{{route('news')}}">Новости</a>
                    </div>

                    <div>
                        <a href="#">Контакты</a>
                    </div>
                </div>
                <div class="right">
                    <div class="phone_block">
                        <a href="tel:+79991112233">+7-999-111-22-33</a>
                        <span>Круглосуточно</span>
                    </div>
                    @auth
                    <div class="icons_panel">
                        <a class="favs" href="{{route('favourite')}}">
                            <span class="count">{{Auth::user()->elect()->count()}}</span>
                            <img src="{{URL::asset('assets/svg/star.svg')}}" alt="">
                        </a>
                        <a class="shopping-cart" href="{{route('showCart')}}">
                            <span class="count">{{Auth::user()->cart()->first()->products()->count()}}</span>
                            <img src="{{URL::asset('assets/svg/shopping-cart.svg')}}" alt="">

                        </a>
                    </div>
                    @endif
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
            <div class="header-search search-hidden">
                <form action="{{route('search',[1])}}" method="post">
                    @csrf
                    <input type="search" name="model" id="" placeholder="Поиск по модели">
                </form>
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
<script src="{{URL::asset('resources/js/slider.js')}}"></script>
<script src="{{URL::asset('resources/js/menu.js')}}"></script>
<script src="{{URL::asset('resources/js/summ.js')}}"></script>
<script src="{{URL::asset('resources/js/counter.js')}}"></script>
<script src="{{URL::asset('resources/js/thrw.js')}}"></script>
<script src="{{URL::asset('resources/js/checkMenuProfile.js')}}"></script>
</html>
