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
</div>
@endsection('content')
