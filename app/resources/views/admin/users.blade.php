@extends('admin.panel')
@section('context')
<div class="users">
    <table>
        <thead>
            <tr>
                <td>ФИО</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($info as $user)
            <tr>
                <td>
                    <a href="{{route('user_panel',[$user->id])}}">{{$user->name}} {{$user->sername}} {{$user->patronymic}}</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection