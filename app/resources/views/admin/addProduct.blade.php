@extends('admin.panel')
@section('context')
<div class="product">
    <form action="{{route('addShowProduct')}}" method="post" enctype="multipart/form-data">
        @csrf
    <div class="left">
        <div class="preview">
            <input type="file" name="img" id="">
        </div>
        <div class="info">
            <h3>Информация</h3>
            <div class="y">
                <div class="table">
                    @foreach ( $allAttributes as $attribute )
                    <div class="elem">
                        <span class="title" id="{{$attribute->id}}">
                            {{$attribute->value}}
                        </span>
                        <span class="value">
                            <select name="attr-{{$attribute->id}}" id="">
                                <option value="null">Нет</option>
                                @foreach ($attribute->attributesValue()->get() as $at)
                                <option value="atv-{{$at->id}}">{{$at->value}}</option>
                                @endforeach
                            
                            </select>
                        </span>
                    </div>
                    @endforeach
                   
                </div>

            </div>
           
        </div>
      </div>
     <div class="right">
        <div class="c">
            <input type="text" name="company" id="" >
        </div>
        <h2 class="title">
            <input type="text"  name="model">
        </h2>
        <div class="text">
            <h3>Описание товара</h3>
            <textarea name="text"></textarea>
        </div>
        <div class="prices">
            <h3>Цены в нашем магазине</h3>
            <div class="pss">
                <div class="l">
                    <div class="k">
                        <span class="tl">Будний</span>
                        <span class="price">
                            <input type="number" name="price_wkday"> Р</span>
                    </div>
                    <div class="k">
                        <span class="tl">Выходной</span>
                        <span class="price">
                        <input type="number"  name="price_wend"> Р</span>
                    </div>
                </div>
                <div class="l">
                    <div class="k">
                            <span class="tl">Неделя</span>
                            <span class="price"> <input type="number"  name="price_week">Р</span>
                    </div>
                    <div class="k">
                            <span class="tl">Месяц</span>
                            <span class="price"><input type="number"  name="price_month"> Р</span>
                    </div>
                 </div>
            </div>
        </div>
        <div class="tags">
            <h3>Облако тегов</h3>
            <div class="ts">
            <input type="text" name="new">
            </div>
        </div>
     </div>
     <button type="submit">Сохранить</button>
    </form>
     
    </div>
@endsection