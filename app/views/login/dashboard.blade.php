@extends('layouts.scaffold')

@section('main')
<h1>ADMINISTRATIVE DASHBOARD</h1>
<p>Добрый день <b>{{{ Auth::user()->username}}}</b></p>

@stop
