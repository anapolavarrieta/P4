@extends('_master')
	@section('title')
		Registro
	@stop 
	
	@section('content')
		<div id="registros"> 
			{{Form::open(array('url'=>'entry'))}}
				<h1 id="registro"> Registro de Horas </h1>
				<br/>				
				{{Form::hidden('latitude', '', array('id'=>'latitude'))}}
				{{Form::hidden('longitude', '', array('id'=>'longitude'))}}
				{{Form::submit ('Registrar Entrada', array('class'=>'btn btn-primary btn-lg'))}} 
			{{Form::close()}}
			<br/>
			{{Form::open(array('url'=>'exit'))}}
				{{Form::hidden('latitude2', '0', array('id'=>'latitude2'))}}
				{{Form::hidden('longitude2', '0', array('id'=>'longitude2'))}}
				{{Form::submit ('Registrar Salida', array('class'=>'btn btn-primary btn-lg'))}} 
			{{Form::close()}}
		</div>

		<script>
			function getLocation() {
    		if (navigator.geolocation) {
		        navigator.geolocation.getCurrentPosition(function(position){
		        	var ele = document.getElementById("latitude");
		        	var elem= document.getElementById("latitude2");
		        	ele.value = position.coords.latitude;
		        	elem.value= position.coords.latitude;
		        	var ele2 = document.getElementById("longitude");
		        	var elem2= document.getElementById("longitude2");
		        	ele2.value = position.coords.longitude;
		        	elem2.value= position.coords.longitude;
		        });
		          
    		} else { 
        		x.innerHTML = "Geolocation is not supported by this browser.";
    		}
		}

		getLocation();
		
		function showPosition(position) {
    		x.innerHTML= position.coords.latitude;
    		//+ 
		    //"<br>Longitude: " + position.coords.longitude;	
		}
		</script>
	@stop
@stop
