@extends('admin.panel')
@section('context')
<div class="table">
    <ul>
    <form action="{{route('addAttr')}}" method="post">
        @csrf
        <input class="title" name="attrName">
        <ul class="value">
            <li>
                <input type="text" name="new" >
            </li>
        </ul>
        <button type="submit">Сохранить</button>
    </form>
    @foreach ( $info as $attribute )
        <li class="elem">
            <form action="{{route('redAttr')}}" method="post">
                @csrf
                <input class="title" name="at-{{$attribute->id}}" id="{{$attribute->id}}" value=" {{$attribute->value}}">
                <ul class="value">
                    @foreach ($attribute->attributesValue()->get() as $at)
                    <li>
                        <input type="text" name="atv-{{$at->id}}" value="{{$at->value}}">
                    </li>
                    @endforeach
                    <li>
                        <input type="text" name="new" >
                    </li>
                </ul>
                <button type="submit">Сохранить</button>
            </form>
           
        </li>
        @endforeach
    </ul>
      
        
    </div>
@endsection