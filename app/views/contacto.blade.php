@extends('_master')

	@section ('title')
		Contacto
	@stop

	@section ('content')
		<h2 id="contacto"> Contactanos </h2>
		{{ Form::open(array('url'=>'/contacto'))}}
			{{Form::label('client','Nombre:')}}
			{{Form::text('client')}}
			<br><br>
			{{Form::label('email','E-mail:')}}
			{{Form::email('email')}}
			<br><br>
			{{Form::label('phone','Teléfono:')}}
			{{Form::input('number', 'phone')}}
			<br><br>
			{{Form::label('message','Mensaje:')}}
			{{Form::textarea('message', '', array('placeholder'=>'Dejanos tu mensaje'))}}
			<br>
			{{Form::submit('Enviar')}}
	@stop

@stop