@extends('_master')
	@section('title')
		Horas Usuarios
	@stop

	@section('content')
		<h1> Escoge Usuario </h1>
		<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Nombre </th>
					<th>Apellidos </th>
				</tr>
			</thead>
			<tbody>
				@foreach($users as $user) 
        			<tr>
        				<td>{{$user->id}}</td>
        				<td>{{$user->name}}</td>
        				<td>{{$user->last_name}}</td>
        				<td> <a href="{{ URL::to('userhours/' . $user->id) }}">Horas usuario </a></td>
        			</tr>
   				@endforeach
   			</tbody>
   		</table>
   		</div>
	@stop
@stop


	