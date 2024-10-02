@extends('layouts.app')
@section('content')
<div class="body">
    <div class="catalog">
        {{Breadcrumbs::render()}}
        <h2>Каталог</h2>
        <div class="count">
            Найдено <span>{{$count}} товаров</span>
        </div>
        <div class="catalog_header">
        @include('paginationCatalog')
        </div>
        <div class="c_body">
            <div class="catalog_list">
                @foreach ($catalog as $product)
                <div class="c_product">
                    <div class="preview">
                        <img src={{Storage::url($product->mean_image)}} alt="">
                    </div>
                    <span class="title">
                        {{$product->model}}
                    </span>
                    <span class="company">
                        {{$product->company()->first()->name}}
                    </span>
                    <span class="price">
                        От {{$product->price_wkday}} Р
                    </span>
                    <a class="c_btn" href="/product/{{$product->id}}">Подробнее</a>
                </div>
                @endforeach
            </div>
            @include('filterCategory')
        </div>
   
    </div>
 
</div>

@endsection('content')