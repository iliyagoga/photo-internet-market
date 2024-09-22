@extends('layouts.app')
@section('content')
    <div class="preorder">
        <h2><span>Оформление</span> заказа</h2>
        <h3>Подтверждение заказа</h3>
        <div class="first_total">
            <div class="block">
                <div class="left">
                    <span>Сумма заказа:</span>
                    <p>{{$summ}} Р</p>
                </div>
                <div class="right">
                    <img src="{{URL::asset('/assets/svg/Group.svg')}}" alt="">
                </div>
            </div>
            <div class="block">
                <div class="left">
                    <span>Период:</span>
                    <p>{{$dates}}</p>
                </div>
                <div class="right">
                    <img src="{{URL::asset('/assets/svg/Group (1).svg')}}" alt="">
                </div>
            </div>
            <div class="block">
                <div class="left">
                    <span>Получатель:</span>
                    <p>{{Auth::user()->name}} {{Auth::user()->patronymic}} {{Auth::user()->sername}}</p>
                </div>
                <div class="right">
                    <img src="{{URL::asset('/assets/svg/Vector (1).svg')}}" alt="">
                </div>
            </div>
        </div>
        <div class="products_table">
            <h3>Товары</h3>
            <table>
                <thead>
                    <tr>
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
                            <span>X{{$product->pivot->count}}</span>
                        </td>
                        <td class="tot">
                            <span>{{$product->pivot->count*$product->price_wkday}} Р</span>
                        </td>
                    </tr>
              
                    @endforeach
                </tbody>
            </table>
        </div>
        <form action="{{route('createOrder')}}" method="post">
            @csrf
            @foreach ($products as $product )
                <input type="hidden"  name="p_{{$product->id}}" value="{{$product->pivot->count}}">
            @endforeach
            <input type="hidden" name="dates" value="{{$dates}}">
            <div class="dops">
                <div class="point">
                    <div class="k">
                        <input type="checkbox" name="convoy" id="c">
                        <label for="c">Использовать сопровождение</label>
                    </div>
                    <span>+ 5000 Р</span>
                </div>
                <div class="point">
                    <div class="k">
                        <input type="checkbox" name="delivery" id="d">
                        <label for="d">Требуется доставка (бесплатно)</label>
                    </div>
                    <span>+ 300 Р</span>
                </div>
                <div class="point">
                    <div class="k">
                        <input type="checkbox" name="onlinepay" id="o">
                        <label for="o">Онлайн оплата</label>
                    </div>
                </div>
            </div>
            <div class="comment">
                <textarea name="comment" placeholder="Ваши комментарии, дополнительные просьбы" id=""></textarea>
            </div>
            <button type="submit">
                Оформить заказ
            </button>
        </form>
    </div>
@endsection