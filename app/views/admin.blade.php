@extends('_master')
	@section('title')
		Lista Usuarios
	@stop

	@section('content')
		<h1> Lista de usuarios </h1>
		<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Nombre </th>
					<th>Apellidos </th>
					<th> Mail </th>
					<th> Teléfono </th>
					<th> Universidad </th>
					<th> Id Universidad </th>
					<th> Carrera </th>
					<th> Semestre </th>
				</tr>
			</thead>
			<tbody>
				@foreach($users as $user) 
        			<tr>
        				<td>{{$user->id}}</td>
        				<td>{{$user->name}}</td>
        				<td>{{$user->last_name}}</td>
        				<td>{{$user->email}}</td>
        				<td>{{$user->phone}}</td>
        				<td>{{$user->university}}</td>
        				<td>{{$user->university_id}}</td>
        				<td>{{$user->major}}</td>
        				<td>{{$user->semester}}</td>
        				<td> <a href="{{ URL::to('edit_user/' . $user->id) }}">Editar </a></td>
        				<td> <a href="{{URL::to('delete_user/' . $user->id)}}">Eliminar </a></td>
        			</tr>
   				@endforeach
   			</tbody>
   		</table>
   		</div>
	@stop
@stop