@extends('layouts.app')

@section('content')
<div class="register">
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <h2>Регистрация</h2>
        <div class="r_body">
            <div class="fileds">
                <div class="line">
                    <div class="block">
                        <label for="sername" class="">Фамилия</label>

                        <input id="sername" type="text" class="" name="sername" value="{{ old('sername') }}" required autocomplete="name" autofocus>

                        @error('sername')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>

                    <div class="block">
                        <label for="name" class="">Имя</label>

                        <input id="name" type="text" class="" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="line">
                    <div class="block">
                        <label for="patronymic" class="">Отчество</label>

                        <input id="patronymic" type="text" class="" name="patronymic" value="{{ old('patronymic') }}" required autocomplete="name" autofocus>

                        @error('patronymic')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>

                    <div class="block">
                        <label for="s_sername" class="">Предыдущая фамилия (если менялась)</label>

                        <input id="s_sername" type="text" class="" name="s_sername" value="{{ old('s_sername') }}" autocomplete="name" autofocus>

                        @error('s_sername')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="line">
                    <div class="block">
                        <label for="phone" class="">Телефон</label>

                        <input id="phone" type="text" class="" name="phone" value="{{ old('phone') }}" required autocomplete="name" autofocus>

                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="block">
                        <label for="email" class="">Почта</label>

                        <input id="email" type="text" class="" name="email" value="{{ old('email') }}" required autocomplete="name" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="line">
                    <div class="block">
                        <label for="password" class="">Пароль</label>

                        <input id="password" type="password" class="" name="password" required autocomplete="name" autofocus>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="block">
                        <label for="password_confirma" class="">Повтор пароля</label>

                        <input id="password_confirma" type="password" class="" name="password_confirmation" required autocomplete="name" autofocus>
                    </div>
                </div>
            </div>

            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Register') }}
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
