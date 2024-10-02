<?php
use Diglactic\Breadcrumbs\Breadcrumbs;
// Метод хлебных крошек
Breadcrumbs::for('main', function ($trail) {
    $trail->push('Главная', route('main'));
});


Breadcrumbs::for('home', function ($trail) {
    $trail->parent('main');
    $trail->push('Домашняя страница', route('home'));
});

Breadcrumbs::for('categories', function ($trail) {
    $trail->parent('main');
    $trail->push('Категории', route('categories'));
});

Breadcrumbs::for('news', function ($trail) {
    $trail->parent('main');
    $trail->push('Новости компании', route('news'));
});

Breadcrumbs::for('catalog', function ($trail,$request) {
    $trail->parent('main');
    $trail->push('Каталог', route('catalog',$request));
});

Breadcrumbs::for('category', function ($trail,$cValue) {
    $trail->parent('main');
    $trail->push($cValue->value, route('category',[$cValue->name,1,1]));
});

Breadcrumbs::for('profile', function ($trail) {
    $trail->parent('main');
    $trail->push('Профиль', route('profile'));
});

Breadcrumbs::for('showCart', function ($trail) {
    $trail->parent('main');
    $trail->push('Корзина', route('showCart'));
});

Breadcrumbs::for('showPreOrder', function ($trail) {
    $trail->parent('main');
    $trail->push('Предзаказ', route('showPreOrder'));
});

Breadcrumbs::for('register', function ($trail) {
    $trail->parent('main');
    $trail->push('Регистрация Этап 1', route('register'));
});

Breadcrumbs::for('showEtap2', function ($trail) {
    $trail->parent('register');
    $trail->push('Регистрация Этап 2', route('showEtap2'));
});

Breadcrumbs::for('showEtap3', function ($trail) {
    $trail->parent('showEtap2');
    $trail->push('Регистрация Этап 3', route('showEtap3'));
});

Breadcrumbs::for('getProduct', function ($trail,$product) {
    $trail->parent('category', $product->category()->first());
    $trail->push($product->model, route('getProduct',[$product->id]));
});