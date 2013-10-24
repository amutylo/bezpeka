@extends('layouts.scaffold')

@section('main')

<h1>Редактирование каталога</h1>
{{ Form::model($catalog, array('method' => 'PATCH', 'route' => array('catalogs.update', $catalog->id))) }}
    <ul>
        <li>
            {{ Form::label('catalog', 'Каталог:') }}
            {{ Form::text('catalog') }}
        </li>
        <li>
            {{ Form::label('c_description', 'Описание:') }}
            {{ Form::text('c_description') }}
        </li>
        <li>
            {{ Form::label('active', 'активный:') }}
            {{ Form::text('active') }}
        </li>
        <li>
            {{ Form::submit('Обновить', array('class' => 'btn btn-info')) }}
            {{ link_to_route('catalogs.show', 'Отмена', $catalog->id, array('class' => 'btn')) }}
        </li>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop
