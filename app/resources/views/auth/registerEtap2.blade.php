@extends('layouts.app')

@section('content')
<div class="register etap2">
    <form method="POST" action="{{ route('etap2') }}">
        @csrf
        <h2>Регистрация</h2>
        <h3>Этап 2</h3>
        <p class="text">Следующая информация необходима нам для решения о необходимости 
        и размере залога по Вашему заказу. Пожалуйста, заполните её для снижения суммы залога. Если Вы хотите взять технику на условиях 100% залога, нажмите</p>
        <a href="{{url('/c/1/1')}}" class="skip">Пропустить</a>
        <div class="r_body">
            <div class="fields">
                <div class="line">
                    <div class="block">
                        <label for="passport" class="">Паспорт (Серия, No)</label>

                        <input id="passport" type="text" class="" name="passport" value="{{ old('passport') }}"  autocomplete="name" autofocus>

                        @error('passport')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="block">
                        <label for="date" class="">Дата выдачи</label>

                        <input id="date" type="date" class="" name="take_date" value="{{ old('take_date') }}" required autocomplete="name" autofocus>

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

                        <input id="residence_address" type="text" class="" name="residence_address" value="{{ old('residence_address') }}" required autocomplete="name" autofocus>

                        @error('residence_address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="block">
                        <label for="live_address" class="">Адрес проживания, если отличается</label>

                        <input id="live_address" type="text" class="" name="live_address" value="{{ old('live_address') }}" autocomplete="name" autofocus>

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

                        <input id="taker" type="text" class="" name="taker" value="{{ old('taker') }}" required autocomplete="name" autofocus>

                        @error('taker')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <p>Для увеличения вероятности положительного решения по залогу заполните данные о месте учебы/работы</p>

                <button type="submit" class="btn btn-primary">
                    продолжить регистрацию
                </button>
            </div>

        </div>
    </form>
</div>
@endsection
