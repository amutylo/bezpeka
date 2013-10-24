@extends('layouts.scaffold')

@section('main')

<h1>Все роли</h1>

<p>{{ link_to_route('roles.create', 'Добавить новую роль') }}</p>

@if ($roles->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
                <th>Роль</th>
                <th>Описание</th>
				<th>Действия</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($roles as $role)
				<tr>
					<td>
                        {{{ $role->role }}}
                    </td>
                    <td>
                        <span class="badge">{{{ $role->description }}}</span>
                    </td>
                    <td>
                        {{ link_to_route('roles.edit', 'Редактировать', array($role->id), array('class' => 'btn btn-info')) }}
                    </td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('roles.destroy', $role->id))) }}
                            {{ Form::submit('Удалить', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	<p>Ролей еще не создано</p>
@endif

@stop
