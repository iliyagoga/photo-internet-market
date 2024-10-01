@extends('layouts.app')
@section('content')
<div class="profile">
    <h2><span>Личный</span> кабинет</h2>
    <div class="profile_menu">
        <div class="left-menu">
            <div class="active">
                <span>Профиль</span>
            </div>
            <div>
                <span>История заказов</span>
            </div>
        </div>
        <form method="post" action="{{route('logout')}}">
        @csrf
            <button type="submit">
            <img src="{{URL::asset('assets/svg/logout-3-svgrepo-com.svg')}}" alt="">
            </button>
        </form>
    </div>
    <div class="fields">
        <div class="filed-1 field">
            @include('profile/accaunt')
        </div>
        <div class="field-2 field hidden">
            @include('profile/history')
        </div>
       
       
    </div>
</div>
@endsection