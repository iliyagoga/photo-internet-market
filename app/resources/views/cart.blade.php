@extends('layouts.app')
@section('content')
<div class="cart">
    {{Breadcrumbs::render()}}
    <h2>Корзина</h2>
    <div class="times">
        <form action="{{route('redactDates')}}">
            @csrf
            <div class="time">
                <div class="block">
                    <label for="time_start">C какого числа</label>
                    <input type="date" id="time_start" name="time_start" value="{{empty(old('time_start'))?$cart->start:old('time_start')}}">
                    @error('time_start')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <button type="submit" class="create">
                    Изменить даты
                </button>
                <div class="block">
                    <label for="time_end">До какого числа</label>
                    <input type="date" id="time_end" name="time_end"value="{{empty(old('time_end'))?$cart->stop:old('time_end')}}">
                    @error('time_end')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
            </div>
  
        </form>
   
        <form action="{{route('showPreOrder')}}" method="post">
            @csrf
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
                        @foreach ($products as $product )
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
                                    <span class="price">{{$product->price_wkday}} Р</span>
                                </td>
                                <td>
                                    <div class="counter">
                                        <div class="minus">
                                            <img src="{{URL::asset('assets/svg/minus-symbol (1).svg')}}" alt="">
                                        </div>
                                        <input type="hidden" value="{{$product->pivot->count}}" name="product_{{$product->id}}">
                                        <span>{{$product->pivot->count}}</span>
                                        <div class="plus">
                                        <img src="{{URL::asset('assets/svg/mathematical-addition-sign.svg')}}" alt="">
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="summ">{{$product->price_wkday*$product->pivot->count}} Р</span>
                                </td>
                                <td>
                                    <div class="delete">
                                       <a href="{{route('deleteFromCart',['product_id'=>$product->id])}}">
                                       <img src="{{URL::asset('assets/svg/Vector.svg')}}" alt="">
                                       </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="cart_footer">
                <div class="s"></div>
                <button type="submit" class="create">
                    Оформить заказ
                </button>
                <div class="total">
                    <span class="tot">Итого: </span>
                    <div class="s">
                        <p class="num">0 Р</p>
                        <p class="t">Цена указана за <span>{{round((strtotime($cart->stop)-strtotime($cart->start))/(60*60*24))}}</span> суток</p>
                    </div>
                </div>
            </div>

        </form>
      
    </div>
</div>
@endsection