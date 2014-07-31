@extends('_master')
	@section ('title')
		Login
	@stop

	@section ('content')
		<h1> Log in </h1>
		{{Form::open(array('url'=>'login'))}}
			{{Form::label('email','Email:')}}
			{{Form::text('email')}}
			<br><br>
			{{Form::label('password','Password:')}}
			{{Form::password('password')}}	
			<br><br>
			{{Form::submit ('Entrar')}}
		{{Form::close()}}
	@stop
@stop