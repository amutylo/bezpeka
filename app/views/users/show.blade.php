/**
 * Created by PhpStorm.
 * User: andrem
 * Date: 23.10.13
 * Time: 11:35
 */
@extends('layouts.scaffold')
@section('main')
<h1>Пользователи</h1>
<p>{{ link_to_route('users.index', 'Return to all users') }}</p>
<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>Username</th>
        <th>Email</th>
        <th>Roles</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>{{{ $user->username }}}</td>
        <td>{{{ $user->email }}}</td>
        <td>
            @foreach($user->roles as $role)
            <span class="badge">{{{ $role->role }}}</span>
            @endforeach
        </td>
        <td>{{ link_to_route('users.edit', 'Edit', array($user->id), array('class' => 'btn btn-info')) }}</td>
        <td>
            {{ Form::open(array('method' => 'DELETE', 'route' => array('users.destroy', $user->id))) }}
            {{ Form::submit('Удалить', array('class' => 'btn btn-danger')) }}
            {{ Form::close() }}
        </td>
    </tr>
    </tbody>
</table>
@stop