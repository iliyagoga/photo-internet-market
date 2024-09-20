@extends('layouts.app')
@section('content')
<div class="profile">
    <h2><span>Личный</span> кабинет</h2>
    <div class="profile_menu">
        <form method="post" action="{{route('logout')}}">
        @csrf
            <button type="submit">
            <img src="{{URL::asset('assets/svg/logout-3-svgrepo-com.svg')}}" alt="">
            </button>
        </form>
    </div>
    <div class="fields">
        <form action="{{route('updateProfile')}}" method="post">
            @csrf
            <div class="base_info">
                <div class="line">
                    <div class="block">
                        <label for="sername" class="">Фамилия *</label>

                        <input id="sername" type="text" class="" name="sername" value="{{ empty(old('sername'))?Auth::user()->sername:old('sername') }}" required autocomplete="name" autofocus>

                        @error('sername')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="block">
                        <label for="name" class="">Имя *</label>

                        <input id="name" type="text" class="" name="name" value="{{ empty(old('name'))?Auth::user()->name:old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="line">
                    <div class="block">
                        <label for="patronymic" class="">Отчество *</label>

                        <input id="patronymic" type="text" class="" name="patronymic" value="{{ empty(old('patronymic'))?Auth::user()->patronymic:old('patronymic') }}" required autocomplete="name" autofocus>

                        @error('patronymic')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="block">
                        <label for="s_sername" class="">Предыдущая фамилия (если менялась)</label>

                        <input id="s_sername" type="text" class="" name="s_sername" value="{{ empty(old('s_sername'))?Auth::user()->s_sername:old('s_sername') }}" autocomplete="name" autofocus>

                        @error('s_sername')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="line">
                    <div class="block">
                        <label for="phone" class="">Телефон *</label>

                        <input id="phone" type="text" class="" name="phone" value="{{ empty(old('phone'))?Auth::user()->phone:old('phone') }}" required autocomplete="name" autofocus>

                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="block">
                        <label for="email" class="">Почта *</label>

                        <input id="email" type="email" class="" name="email" value="{{ empty(old('email'))?Auth::user()->email:old('email') }}" required autocomplete="name" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="line">
                    <div class="block">
                        <label for="date" class="">Дата рождения *</label>

                        <input id="date" type="date" class="" name="birthday" value="{{empty(old('birthday'))?Auth::user()->birthday:old('birthday')}}" required autocomplete="name" autofocus>

                        @error('birthday')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="block">
                        <label for="s_phone" class="">Дополнительный телефон</label>

                        <input id="s_phone" type="phone" class="" name="s_phone" value="{{empty(old('s_phone'))?Auth::user()->s_phone:old('s_phone')}}" autocomplete="name" autofocus>

                        @error('s_phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="passport">
                <h3>Паспортные <span>данные</span></h3>
                <div class="line">
                    <div class="block">
                        <label for="passport" class="">Паспорт (Серия, No)</label>

                        <input id="passport" type="number" class="" name="passport" value="{{empty(old('passport'))?Auth::user()->usersInfo->passport:old('passport')}}"  autocomplete="name" autofocus>

                        @error('passport')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="block">
                        <label for="date" class="">Дата выдачи</label>

                        <input id="date" type="date" class="" name="take_date" value="{{empty(old('take_date'))?Auth::user()->usersInfo->take_date:old('take_date')}}" required autocomplete="name" autofocus>

                        @error('take_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="line">
                    <div class="block">
                        <label for="residence_address" class="">Адрес прописки</label>

                        <input id="residence_address" type="text" class="" name="residence_address" value="{{empty(old('residence_address'))?Auth::user()->usersInfo->residence_address:old('residence_address')}}" required autocomplete="name" autofocus>

                        @error('residence_address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="block">
                        <label for="live_address" class="">Адрес проживания, если отличается</label>

                        <input id="live_address" type="text" class="" name="live_address" value="{{empty(old('live_address'))?Auth::user()->usersInfo->live_address:old('live_address')}}" autocomplete="name" autofocus>

                        @error('live_address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="line">
                    <div class="block">
                        <label for="taker" class="">Кем выдан</label>

                        <input id="taker" type="text" class="" name="taker" value="{{empty(old('taker'))?Auth::user()->usersInfo->taker:old('taker')}}" required autocomplete="name" autofocus>

                        @error('taker')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="second_info">
                <h3>Данные о месте <span>учебы/работы</span></h3>
                <div class="line">
                    <div class="block">
                        <label for="company_name" class="">Место работы/учебы</label>

                        <input id="company_name" type="text" class="" name="company_name" value="{{empty(old('company_name'))?Auth::user()->usersInfo->company_name:old('company_name')}}"  autocomplete="name" autofocus>

                    </div>

                    <div class="block">
                        <label for="post" class="">Должность/специальность</label>

                        <input id="post" type="text" class="" name="post" value="{{empty(old('post'))?Auth::user()->usersInfo->post:old('post')}}" required autocomplete="name" autofocus>


                    </div>
                </div>
                <div class="line">
                    <div class="block">
                        <label for="w_phone" class="">Рабочий телефон</label>

                        <input id="w_phone" type="phone" class="" name="w_phone" value="{{empty(old('w_phone'))?Auth::user()->usersInfo->w_phone:old('w_phone')}}" required autocomplete="name" autofocus>


                    </div>

                    <div class="block">
                        <label for="from" class="">Откуда вы о нас узнали</label>

                        <input id="from" type="text" class="" name="from" value="{{empty(old('from'))?Auth::user()->usersInfo->from:old('from')}}" autocomplete="name" autofocus>

                    </div>
                </div>
                <div class="line">
                    <div class="block">
                        <label for="witness" class="">Кто может Вас порекомендовать?</label>

                        <input id="witness" type="text" class="" name="witness" value="{{empty(old('witness'))?Auth::user()->usersInfo->witness:old('witness')}}" required autocomplete="name" autofocus>

                    </div>
                </div>
            </div>
            <button type="submit">Сохранить</button>
        </form>
    </div>
</div>
@endsection