<!DOCTYPE html>
<html lang="en">

<head>
	<title>@yield ('title', 'PaketeAlivianes')</title>
	<meta charset="utf-8">
	<link href="css//Bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css" type="text/css"> 
</head>

<body>
	<div class="container">
		<div class="row">
			<div class= "col-md-10">
				<a href='/' ><img src= "{{URL::asset('/images/logo.png')}}" alt="PaketeAlivianes Logo"/></a>
			</div>
			<div class="col-md-2">
				<p> <a href='/login'> Login </a><p>
				<p> <a href='/signup'>Crea una cuenta </a></p>
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
        	</div>
      	</div>
	</div>

	@yield('content')
	@yield('body')
	@yield ('footer')

</body>