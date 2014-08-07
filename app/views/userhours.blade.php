@extends('_master')

	@section ('title')
		Horario Usuario
	@stop

	@section('content')
		<h2> Usuario: {{$user->name}} {{$user->last_name}}
		<div class="table-responsive">
			<table class="table table-hover">
				<?php $flag=1; ?>
				<thead>
					<tr>
						<th>Fecha </th>
						<th>Hora </th>
						<th>Tipo de registro </th>
					</tr>
				</thead>
				<tbody>
					@foreach ($user->register as $register)
						<tr>
							@if ($register->date == $date1 && $flag!= 1)
								<td> </td>
							@else
								<td>{{$register->date}}</td>
								<?php $date1= $register->date ?>
								<?php $flag=0; ?>
							@endif
							<td>{{$register->time}}</td>
							<td>{{$register->type}}
						</tr>
					@endforeach
				</tbody>	
			</table>
		</div>
	@stop
@stop