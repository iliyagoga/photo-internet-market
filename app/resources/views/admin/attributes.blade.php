@extends('admin.panel')
@section('context')
<div class="table">
    <ul>
    @foreach ( $info as $attribute )
        <li class="elem">
            <input class="title" name="at-{{$attribute->id}}" id="{{$attribute->id}}" value=" {{$attribute->value}}">
            <ul class="value">
                @foreach ($attribute->attributesValue()->get() as $at)
                <li>
                    <input type="text" name="atv-{{$at->id}}" value="{{$at->value}}">
                </li>
                @endforeach
            </ul>
        </li>
        @endforeach
    </ul>
      
        
    </div>
@endsection