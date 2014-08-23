@extends('_master')
	@section('title')
		Password
	@stop 
	
	@section('content')
		@if (Session::has('error'))
		  {{ trans(Session::get('reason')) }}
		@elseif (Session::has('success'))
  			An email with the password reset has been sent.
		@endif
 
		{{ Form::open(array('route' => 'passwordrequest')) }}
 
  			<p>{{ Form::label('email', 'Email') }}
  			{{ Form::text('email') }}</p>
 
	  		<p>{{ Form::submit('Submit') }}</p>
 
		{{ Form::close() }}
	@stop
@stop