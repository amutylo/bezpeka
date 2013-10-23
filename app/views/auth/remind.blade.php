@extends('layouts.scaffold')

@section('main')

@if (Session::has('error'))
    <div class="alert alert-error">
        {{ trans(Session::get('reason')) }}
    </div>
@elseif (Session::has('success'))
    <div class="alert alert-success">
        An e-mail with the password reset has been sent.
    </div>
@endif
    <h1>Forgot your password?</h1>
    <p>{{ link_to_route('login.index', 'Нет') }}</p>
    {{ Form::open() }}

    <ul>
        <li>
        {{ Form::label('email', 'Ваш email')}}
        {{ Form::email('email') }}
        </li>
        <li>
        {{ Form::submit('Послать напоминание', array('class' => 'btn')) }}
        </li>
    </ul>

    {{ Form::close() }}

@stop
