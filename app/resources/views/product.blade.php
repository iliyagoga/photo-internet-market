@extends('layouts.app')

@section('content')
<div class="body">
    <div class="product">
      <div class="left">
        <div class="preview">
            <img src={{Storage::url($product->mean_image)}} alt="">
        </div>
        <div class="info">
            <h3>Информация</h3>
            <div class="table">
                @foreach ( $attributes as $attributeValue )
                <div class="elem">
                    <span class="title">
                        {{$attributeValue->attributes->value}}
                    </span>
                    <span class="value">
                        {{$attributeValue->value}}
                    </span>
                </div>
                @endforeach
         
            </div>
        </div>
      </div>
     <div class="right">
        <span class="company">{{!empty($company->name)?$company->name:''}}</span>
        <h2 class="title">
            {{$product->model}}
        </h2>
        <span class="check">
            @if($product->stock)
            <div class="b">
                <span>В наличии</span>
            </div>
            @else
            <div class="b">
                <span>Нет в наличии</span>
            </div>
            @endif
        </span>
        <div class="text">
            <h3>Описание товара</h3>
            <p>{{$product->text}}</p>
        </div>
        <div class="prices">
            <h3>Цены в нашем магазине</h3>
            <div class="pss">
                <div class="l">
                    <div class="k">
                        <span class="tl">Будний</span>
                        <span class="price">{{$product->price_wkday}} Р</span>
                    </div>
                    <div class="k">
                        <span class="tl">Выходной</span>
                        <span class="price">{{$product->price_wend}} Р</span>
                    </div>
                </div>
                <div class="l">
                    <div class="k">
                            <span class="tl">Неделя</span>
                            <span class="price">{{$product->price_week}} Р</span>
                    </div>
                    <div class="k">
                            <span class="tl">Месяц</span>
                            <span class="price">{{$product->price_month}} Р</span>
                    </div>
                 </div>
            </div>
        </div>
        <div class="tags">
            <h3>Облако тегов</h3>
            <div class="ts">
            @foreach ( $tags as $tag )
                <div class="tag">
                    <span>{{$tag->value}}</span>
                </div>
            @endforeach
            </div>
        </div>
     </div>
    </div>
</div>
@endsection('content')