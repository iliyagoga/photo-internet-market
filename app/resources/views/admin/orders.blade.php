@extends('admin.panel')
@section('context')
<table>
    <thead>
        <tr>
            <td>id</td>
            <td>начало брони</td>
            <td>конец брони</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($info as $order)
        <tr>
            <td>
                <a href="{{route('order_panel',[$order->id])}}">
                    {{$order->id}}
                </a>
            </td>
            <td>
                <a href="{{route('order_panel',[$order->id])}}">
                    {{$order->start}}
                </a>
            </td>
            <td>
                <a href="{{route('order_panel',[$order->id])}}">
                    {{$order->stop}}
                </a>
            </td>
        </tr>
        
        @endforeach
    </tbody>
</table>

@endsection