@extends('_master')
	@section ('title')
		Signup
	@stop

	@section ('content')
		@foreach($errors->all() as $message) 
			<div class='error'>{{ $message }}</div>
		@endforeach
		<h1 id="h1user"> Crea tu cuenta </h1>
		
		{{ Form::open(array('url'=>'/signup', 'id'=>'auth'))}}
			{{Form::label('email','Email:')}}
			{{Form::email('email')}}
			<br><br>
			{{Form::label('password', 'Password:')}}
			{{Form::password('password')}}
			<br><br>
			{{Form::label('name', 'Nombre:')}}
			{{Form::text('name')}}
			<br><br>
			{{Form::label('last_name', 'Apellidos:')}}
			{{Form::text('last_name')}}
			<br><br>
			{{Form::label('phone','Teléfono')}}
			{{Form::input('number', 'phone')}}
			<br><br>
			{{Form::label('university', 'Universidad:')}}
			{{Form::select('university',array(
				'ibero' => 'Universidad Iberoamericana',
				'anahuac' => 'Universidad Anahuac'
			), 'ibero')}}
			<br><br>
			{{Form::label('university_id', 'Clave de Universidad:')}}
			{{Form::input('number','university_id')}}
			<br><br>
			{{Form::label('major', 'Carrera:')}}
			{{Form::text('major')}}
			<br><br>
			{{Form::label('semester','Semestre:')}}
			{{Form::select('semester', array(
				'1'=> '1',
				'2'=> '2',
				'3'=> '3',
				'4'=> '4',
				'5'=> '5',
				'6'=> '6',
				'7'=> '7',
				'8'=> '8',
				'9'=> '9',
				'10'=> '10',
			), '6')}}
			<br><br>
			{{Form::submit('Enviar')}}
		{{Form::close()}}

	@stop


@stop
