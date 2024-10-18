@extends('admin.panel')
@section('context')
<div class="product">
    <form action="{{route('redProduct')}}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="{{$product->id}}">
        @csrf
    <div class="left">
        <div class="preview">
            <img src={{Storage::url($product->mean_image)}} alt="">
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
                            @php
                            $def = null;
                            foreach($attributes as $r){
                                foreach($attribute->attributesValue()->get() as $at){
                                if($r->id==$at->id){
                                    $def=$at->id;
                                    break;
                                    }
                                }
                            }
                            @endphp
                            <select name="attr-{{$attribute->id}}-attrValDef-{{$def}}" id="">
                                <option value="null">Нет</option>
                                @foreach ($attribute->attributesValue()->get() as $at)
                                <option value="atv-{{$at->id}}" <?php if($def==$at->id)echo 'selected="selected"'?>>{{$at->value}}</option>
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
        <span class="company">{{!empty($company->name)?$company->name:''}}</span>
        <h2 class="title">
            <input type="text" value="{{$product->model}}" name="model">
        </h2>
        <div class="text">
            <h3>Описание товара</h3>
            <textarea name="text">{{$product->text}}</textarea>
        </div>
        <div class="prices">
            <h3>Цены в нашем магазине</h3>
            <div class="pss">
                <div class="l">
                    <div class="k">
                        <span class="tl">Будний</span>
                        <span class="price">
                            <input type="number" value="{{$product->price_wkday}}" name="price_wkday"> Р</span>
                    </div>
                    <div class="k">
                        <span class="tl">Выходной</span>
                        <span class="price">
                        <input type="number" value="{{$product->price_wend}}" name="price_wend"> Р</span>
                    </div>
                </div>
                <div class="l">
                    <div class="k">
                            <span class="tl">Неделя</span>
                            <span class="price"> <input type="number" value="{{$product->price_week}}" name="price_week">Р</span>
                    </div>
                    <div class="k">
                            <span class="tl">Месяц</span>
                            <span class="price"><input type="number" value="{{$product->price_month}}" name="price_month"> Р</span>
                    </div>
                 </div>
            </div>
        </div>
        <div class="tags">
            <h3>Облако тегов</h3>
            <div class="ts">
            @foreach ( $tags as $tag )
                <div class="tag">
                    <input type="text" name="tag-{{$tag->id}}" value="{{$tag->value}}">
                </div>
            @endforeach
            <input type="text" name="new">
            </div>
        </div>
     </div>
     <button type="submit">Сохранить</button>
    </form>
     
    </div>
@endsection