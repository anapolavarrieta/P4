<!DOCTYPE html>
<html lang="en">

<head>
	<title>@yield ('title', 'PaketeAlivianes')</title>
	<meta charset="utf-8">
	<link href="{{URL::asset('/css/Bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="{{URL::asset('/css/style.css')}}" type="text/css"> 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.js"></script>
	<script src="{{URL::asset('/css/Bootstrap/js/bootstrap.min.js')}}"></script>
</head>

<body>
	<div class="container">
		<div class="row">
			<div class= "col-md-10">
				<a href='/' ><img src= "{{URL::asset('/images/logo.png')}}" alt="PaketeAlivianes Logo"/></a>
			</div>
			<div class="col-md-2">
				@if (Auth::check())
					<p> <a href='/logout'> Cerrar Sesión </a></p>
					<p> {{Auth::user()->name;}} </p>
				@else
					<p> <a href='/login'> Iniciar Sesión </a><p>
					<p> <a href='/signup'>Crea una cuenta </a></p>
				@endif
			</div>
		</div>
		<div class="navbar navbar-default" role="navigation">
	        <div class="navbar-header">
    		     <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        			<span class="sr-only">Toggle navigation</span>
            		<span class="icon-bar"></span>
            		<span class="icon-bar"></span>
            		<span class="icon-bar"></span>
          		</button>
          	</div>
        	<div class="collapse navbar-collapse">
        		<ul class="nav navbar-nav">
					<li id="navpart1"><a href='/'>Inicio </a></li>
					<li id="navpart2"><a href='/nosotros'>Nosotros</a></li>
            		<li id="navpart3"><a href='/hacemos'>Que hacemos</a></li>
            		<li id="navpart4"><a href='/galeria'>Galeria</a></li>
					<li id="navpart5"><a href='/experiencias'>Experiencias</a></li>
					<li id="navpart5"><a href='/contacto'>Contacto</a></li>
				</ul>
				<br>
					@if (Auth::check())
						@if(Auth::user()->admin==1)
							<ul class="nav navbar-nav">
								<li clas="userlist"><a class="user" href='/admin'>Lista usuarios </a></li>
								<li clas="userlist"><a class="user" href='/users_hours'>Horas de usuarios</a></li>
           						<li clas="userlist"><a class="user" href='/pages'>Paginas</a></li>
           					</ul>
           				@else
							<ul class="nav navbar-nav">
								<li clas="userlist"><a class="user" href='/user_home'>Registro de Horas </a></li>
								<li clas="userlist"><a class="user" href='/project'>Proyecto</a></li>
           						<li clas="userlist"><a class="user" href='/experience'>Experiencia</a></li>
           					</ul>
           				@endif
					@endif
		  	</div>
      	</div>

      	@if (Session::get('flash_message'))
      		<div class="alert alert-info" role="alert">
      			<button type="button" class="close" data-dismiss="alert">&times;</button>
      			{{Session::get('flash_message')}}
      		</div>
      	@endif
      	<br>
      	
      	@yield('content')
      	

      	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
      	 <script src="/js/getlocation.js"></script>

      	
	</div>

	
	@yield('body')
	@yield ('footer')

</body>