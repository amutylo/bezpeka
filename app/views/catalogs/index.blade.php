@extends('layouts.scaffold')

@section('main')

<h1>Все роли</h1>

<p>{{ link_to_route('catalogs.create', 'Добавить новый каталог') }}</p>

@if ($catalogs->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Название</th>
                <th>Описание</th>
                <th>Активный</th>
                <th>Действия</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($catalogs as $catalog)
                <tr>
                    <td>
                        {{{ $catalog->catalog }}}
                    </td>
                    <td>
                        <span class="badge">{{{ $catalog->c_description }}}</span>
                    </td>
                    <td>
                        <span class="badge">{{{ $catalog->active }}}</span>
                    </td>
                    <td>
                        {{ link_to_route('catalogs.edit', 'Редактировать', array($catalog->id), array('class' => 'btn btn-info')) }}
                    </td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('catalogs.destroy', $catalog->id))) }}
                            {{ Form::submit('Удалить', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>Каталогов еще не создано</p>
@endif

@stop
