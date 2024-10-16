@extends('admin.panel')
@section('context')
<table>
    <thead>
        <tr>
            <td>id</td>
            <td>модель</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($info as $product)
        <tr>
            <td>
                <a href="{{route('product_panel',[$product->id])}}">
                    {{$product->id}}
                </a>
            </td>
            <td>
                <a href="{{route('product_panel',[$product->id])}}">
                    {{$product->model}}
                </a>
            </td>
        </tr>
        
        @endforeach
    </tbody>
</table>

@endsection