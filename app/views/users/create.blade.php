@extends('layouts.scaffold')

@section('main')

<h1>Создать пользователя</h1>

{{ Form::open(array('users' => 'users.store')) }}
    <ul>
        <li>
            {{ Form::label('username', 'Username:') }}
            {{ Form::text('username') }}
        </li>
        <li>
            {{ Form::label('email', 'Email:') }}
            {{ Form::text('email') }}
        </li>
        <li>
            {{ Form::label('password', 'Password:')}}
            {{ Form::password('password')}}
        </li>
        <li>
            {{ Form::submit('Создать', array('class' => 'btn btn-info')) }}
        </li>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop