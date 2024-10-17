@extends('admin.panel')
@section('context')
    <div class="cats">
    @foreach ($info as $c)
        <div class="tr">
            <form action="{{route('redCategory')}}" method="post">
            @csrf
            <div>
                <span>{{$c->id}}</span>
                <input type="hidden" name="id" value="{{$c->id}}">

            </div>
            <div>
                <input type="text" name="value" value="{{$c->value}}">
            </div>
            <div>
                <input type="text" name="name" value="{{$c->name}}">
                  
              
            </div>
            <button type="submit">Сохранить</button>
            </form>
            <form action="{{route('delCategory')}}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{$c->id}}">
                <button type="submit">Удалить</button>
            </form>
        </div>
        
        @endforeach
        <div class="add">
            <form action="{{route('addCategory')}}" method="post">
                @csrf
                <input type="text" name="value" placeholder="Значение">
                <input type="text" name="name" placeholder="Код">
                <button type="submit">Создать</button>
            </form>
        </div>
    </div>
       

@endsection