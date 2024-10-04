@extends('layouts.app')
@section('content')
<div class="elect">
    {{Breadcrumbs::render()}}
    <h2>Избранное</h2>
    <div class="elect_products">
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

                    </td>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product )
                    <tr>
                        <td class="preview">
                            <a href="{{route('getProduct',[$product->id])}}">
                                <img src="{{Storage::url($product->mean_image)}}" alt="">
                            </a>    
                        </td>
                        <td>
                            <div class="name">
                                <a href="{{route('getProduct',[$product->id])}}">
                                    <h3>{{$product->model}}</h3>
                                    <span>{{$product->company()->first()->name}}</span>
                                </a>
                           
                            </div>
                        </td>
                        <td>
                            <span class="price">{{$product->price_wkday}} Р</span>
                        </td>
                        <td>
                            <div class="с">
                            <form class="add" method="post" action="{{route('addToCart')}}">
                                @csrf
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                <button type="submit">Добавить в корзину</button>

                            </form>
                            </div>
                        </td>
                        <td>
                            <div class="delete">
                                <a href="{{route('deleteElect',[$product->id])}}">
                                <img src="{{URL::asset('assets/svg/Vector.svg')}}" alt="">
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection