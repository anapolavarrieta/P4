@extends('_master')
	
	@section('title')
		Registro Horas
	@stop

	@section('content')
		<h1> Se ha registrado tu entrada </h1>
		<p> <a href="/user_home"> Regresar Registro Horas </a></p>
		{{ $latitude}} {{$longitude}}
	@stop
@stop