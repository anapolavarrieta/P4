@extends('_master')
	@section('content')
		<h1> Registro de Horas </h1>
		<p> 
			{{Form::open(array('url'=>'entry'))}}
				{{Form::submit ('Registrar Entrada')}} 
			{{Form::close()}}
		</p>
		<p> 
			{{Form::open(array('url'=>'exit'))}}
				{{Form::submit ('Registrar salida')}} 
			{{Form::close()}}
		</p>
		<p> <a href='/register_list'>Lista de visitas </a></p>
	@stop
@stop
