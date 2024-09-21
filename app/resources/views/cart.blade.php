@extends('layouts.app')
@section('content')
<div class="cart">
    <h2>Корзина</h2>
    <div class="times">
        <form action="post" method="">
            <div class="time">
                <div class="block">
                    <label for="time_start">C какого числа</label>
                    <input type="date" id="time_start" name="time_start" value="{{empty(old('time_start'))?$cart->start:old('time_start')}}">
                </div>
                <div class="block">
                    <label for="time_end">До какого числа</label>
                    <input type="date" id="time_end" name="time_end"value="{{empty(old('time_end'))?$cart->stop:old('time_end')}}">
                </div>
            </div>
            <div class="cart_products">
                <table>
                    <thead>
                        <tr>
                            <td>
                            Фото
                            </td>
                            <td>
                            Название
                            </td>
                            <td>
                            Цена
                            </td>
                            <td>
                            Количество
                            </td>
                            <td>
                            Итого
                            </td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart->products()->withPivot('count')->get() as $product )
                            <tr>
                                <td class="preview">
                                    <img src="{{Storage::url($product->mean_image)}}" alt="">
                                </td>
                                <td>
                                    <div class="name">
                                        <h3>{{$product->model}}</h3>
                                        <span>{{$product->company()->first()->name}}</span>
                                    </div>
                                </td>
                                <td>
           
                                    <span class="price">
                                    {{round((strtotime($cart->stop)-strtotime($cart->start))/(60*60*24))==7?$product->price_week:(round((strtotime($cart->stop)-strtotime($cart->start))/(60*60*24))>=30?$product->price_month:(date('N', strtotime($cart->start)) >= 6?$product->price_wend:$product->price_wkday))}}
                                    </span>
                                </td>
                                <td>
                                    <div class="counter">
                                        <div class="minus">
                                            <img src="{{URL::asset('assets/svg/minus-symbol (1).svg')}}" alt="">
                                        </div>
                                        <input type="number" value="{{$product->pivot->count}}" name="product_{{$product->id}}">
                                        <div class="plus">
                                        <img src="{{URL::asset('assets/svg/mathematical-addition-sign.svg')}}" alt="">
                                        </div>
                                    </div>
                                </td>
                                <td>
                                <span class="summ">
                                    {{round((strtotime($cart->stop)-strtotime($cart->start))/(60*60*24))==7?$product->price_week*$product->pivot->count:(round((strtotime($cart->stop)-strtotime($cart->start))/(60*60*24))>=30?$product->price_month*$product->pivot->count:(date('N', strtotime($cart->start)) >= 6?$product->price_wend*$product->pivot->count:$product->price_wkday*$product->pivot->count))}}
                                    </span>
                                </td>
                                <td>
                                    <div class="delete">
                                        <a href="">
                                            <img src="{{URL::asset('assets/svg/Vector.svg')}}" alt="">
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </form>
      
    </div>
</div>
@endsection