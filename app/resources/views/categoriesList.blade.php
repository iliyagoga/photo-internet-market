@extends('layouts.app')
@section('content')
    <div class="category-list">
        {{Breadcrumbs::render()}}
        <h2>Категории</h2>

        <div class="ls">
            <ul>
            @foreach ($categories as $category)
            <li>
            <a href="{{route('category',[$category->name,1,1])}}">
                    <span >{{$category->value}}</span>
                    <img src="{{URL::asset('../assets/svg/right.svg')}}" alt="">
                </a>
            </li>
             
            @endforeach
            </ul>
         
        </div>
    </div>
@endsection