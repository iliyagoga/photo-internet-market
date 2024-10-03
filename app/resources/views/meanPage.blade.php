@extends ('layouts.app')

@section('content')
<div class="meanpage">
    <div class="banner">
        <div class="he">
            <p><span>Аренда</span> фото</p>
            <p>и видео</p>
            <p>оборудования</p>
            <div class="round">

            </div>
        </div>
    </div>
    <div class="features">
            <div class="el">
                <img src="assets/svg/005-list.svg" alt="">
                <p>Самый большой 
                    <br>
                выбор техники</p>
            </div>
            <div class="el">
                <img src="assets/svg/001-time.svg" alt="">
                <p>Быстрое  <br>
                оформление заказа</p>
            </div>
            <div class="el">
                <img src="assets/svg/004-placeholder.svg" alt="">
                <p>Можно забрать заказ <br>
                в пункте выдачи</p>
            </div>
            <div class="el">
                <img src="assets/svg/002-product.svg" alt="">
                <p>Доставка в любую <br>
                точку Москвы</p>
            </div>
            <div class="el">
                <img src="assets/svg/003-commerce-and-shopping.svg" alt="">
                <p>Оплата картой
                и наличными</p>
            </div>
        </div>
        <div class="text">
            <h3>Вы ищете что-то конкретное?</h3>
            <p>Проект <span>Fotoprokat24</span> является агрегатором предложений всех фотопрокатов Москвы и служит для Вашего удобства. Выберете необходимую категорию, либо начните поиск по названию. Оформив заказ, Вы сможете забрать его из Пункта Выдачи, либо заказать доставку в любую точку Москвы.</p>
            <div class="btns">
                <div class="btn_catalog">
                    <span>перейти в каталог</span>
                </div>
                <div class="search">
                    <input type="text" placeholder="Поиск">
                </div>
            </div>
        </div>
        <div class="categories">
            <div class="block block1">
                <div class="b">
                    <p>Фотокамеры Canon</p>
                    <p>от 3000 рублей</p>
                </div>
            </div>
            <div class="block block2">
                <div class="b">
                    <p>Видеокамеры</p>
                    <p>по 200 рублей в сутки</p>
                </div>
            </div>
            <div class="block block3">
                <div class="b">
                    <p>Товар недели</p>
                    <p>всего за 4000 рублей</p>
                </div>
            </div>
            <div class="block block4">
                <div class="b">
                    <p>Лучшие объективы</p>
                    <p>по 700 рублей</p>
                </div>
            </div>
            <div class="block block5">
                <div class="b">
                    <p>Отличные фотокамеры</p>
                    <p>за 1500 рублей</p>
                </div>
            </div>
        </div>
        <div class="featuress">
            <h3>Зарабатывайте вместе с нами</h3>
            <p>Сдавайте свою технику через наш сервис, разместив её в каталоге, и получайте стабильную прибыль.</p>
            <div class="fss">
                <div class="fs">
                    <span>Доступный способ <br> инвестировать</span>
                    <div class="l">
                        <img src="assets/svg/diamond.svg" alt="">
                    </div>
                </div>
                <div class="fs">
                    <span>Постоянный стабильный <br> доход</span>
                    <div class="l">
                        <img src="assets/svg/calendar-6.svg" alt="">
                    </div>
                </div>
                <div class="fs">
                    <span>Гарантии сохранности <br> техники</span>
                    <div class="l">
                        <img src="assets/svg/umbrella.svg" alt="">
                    </div>
                </div>
                <div class="fs">
                    <span>Прозрачные <br>
                    выплаты</span>
                    <div class="l">
                        <img src="assets/svg/view.svg" alt="">
                    </div>
                </div>
            </div>
            <div class="btn_catalog">
                    <span>Предложить свою технику</span>
            </div>
        </div>
        <div class="news">
            <h3>Новости компании</h3>
            <div class="news_block">
            @foreach ($news as $n )
                <div class="block">
                    <div class="preview">
                        <img src={{Storage::url($n->image)}} alt="">
                    </div>
                    <div class="content">
                        <div class="n_date">
                            <span>{{(new DateTime($n->created_at))->format('j F Y')}}</span>
                        </div>
                        <div class="n_title">
                            <p>{{$n->title}}</p>
                        </div>
                        <div class="n_text">
                            <p>{{$n->text}}</p>
                        </div>
                    </div>
            
                </div>
            @endforeach
           
            </div>
            <div class="btn">
                <a href="{{route('news')}}">Все новости</a>
            </div>
        </div>
</div>
@endsection('content')
