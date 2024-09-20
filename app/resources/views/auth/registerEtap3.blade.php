@extends('layouts.app')

@section('content')
<div class="register etap3">
    <form method="POST" action="{{ route('etap3') }}">
        @csrf
        <h2>Регистрация</h2>
        <h3>Этап 3</h3>
        <p class="text">Спасибо за введенную информацию! Пожалуйста, ответьте еще на несколько вопросов для увеличения вероятности положительного решения по залогу.</p>
        <a href="{{url('/c/1/1')}}" class="skip">Пропустить</a>
        <div class="r_body">
            <div class="fields">
                <div class="line">
                    <div class="block">
                        <label for="company_name" class="">Место работы/учебы</label>

                        <input id="company_name" type="text" class="" name="company_name" value="{{ old('company_name') }}"  autocomplete="name" autofocus>

                        @error('company_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="block">
                        <label for="post" class="">Должность/специальность</label>

                        <input id="post" type="text" class="" name="post" value="{{ old('post') }}" required autocomplete="name" autofocus>

                        @error('post')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="line">
                    <div class="block">
                        <label for="w_phone" class="">Рабочий телефон</label>

                        <input id="w_phone" type="phone" class="" name="w_phone" value="{{ old('w_phone') }}" required autocomplete="name" autofocus>

                        @error('w_phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="block">
                        <label for="from" class="">Откуда вы о нас узнали</label>

                        <input id="from" type="text" class="" name="from" value="{{ old('from') }}" autocomplete="name" autofocus>

                        @error('from')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="line">
                    <div class="block">
                        <label for="witness" class="">Кто может Вас порекомендовать?</label>

                        <input id="witness" type="text" class="" name="witness" value="{{ old('witness') }}" required autocomplete="name" autofocus>

                        @error('witness')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <button type="submit" class="btn btn-primary">
                    завершить регистрацию
                </button>
            </div>

        </div>
    </form>
</div>
@endsection
