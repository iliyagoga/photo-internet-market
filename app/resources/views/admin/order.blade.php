@extends('admin.panel')
@section('context')
<div class="order">
    <table>
        <thead>
            <tr>
                <td>id</td>
                <td>Начало брони</td>
                <td>Конец брони</td>
                <td>Сопровождение</td>
                <td>Онлайн-оплата</td>
                <td>Комментарий</td>
                <td>Сумма заказа</td>
                <td>Покупатель</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->start}}</td>
                <td>{{$order->stop}}</td>
                <td><?php if($order->convoy) echo 'Есть'; else echo 'Нет'?></td>
                <td><?php if($order->onlinepay) echo 'Есть'; else echo 'Нет'?></td>
                <td><?php if($order->comment) echo 'Есть'; else echo 'Нет'?></td>
                <td>{{$order->summ}}</td>
                <td><a href="{{route('user_panel',[$order->user->id])}}">{{$order->user->id}}</a></td>
            </tr>
        </tbody>
    </table>
</div>
@endsection