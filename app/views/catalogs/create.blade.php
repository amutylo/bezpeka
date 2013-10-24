@extends('layouts.scaffold')

@section('main')

<h1>Создать каталог</h1>

{{ Form::open(array('route' => 'catalogs.store')) }}
    <ul>
        <li>
            {{ Form::label('catalog', 'Название:') }}
            {{ Form::text('catalog') }}
        </li>
        <li>
            {{ Form::label('c_description', 'Описание:') }}
            {{ Form::text('c_description') }}
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