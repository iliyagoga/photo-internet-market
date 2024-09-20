@extends('layouts.app')

@section('content')
<div class="background">
    <div class="login">
        <h2>Войдите в свой аккаунт</h2>

        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="field">

                    <input id="email" type="email" class="" name="email" value="{{ old('email') }}" placeholder="Почта" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    @error('error')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="field">
                    <input id="password" type="password" class="" name="password" required placeholder="Пароль" autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    @error('error')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                @if (Route::has('password.request'))
                            <a class="forgot" href="{{ route('password.request') }}">
                                Вспомнить логин или пароль?
                            </a>
                        @endif
                <div class="check">
                    <input  type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label  for="remember">
                    Запомнить пароль для последующего входа
                    </label>
                </div>

                <button type="submit">
                    Войти
                </button>
                <a class="register_b" href="{{route('register')}}">Регистрация</a>
            </form>
        </div>
    </div>
</div>

@endsection
