@extends('admin.panel')
@section('context')
<table>
    <thead>
        <tr>
            <td>id</td>
            <td>модель</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($info as $c)
        <tr>
            <td>
                <a href="#">
                    {{$c->id}}
                </a>
            </td>
            <td>
                <a href="#">
                    {{$c->value}}
                </a>
            </td>
        </tr>
        
        @endforeach
    </tbody>
</table>

@endsection