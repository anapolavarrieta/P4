@extends('_master')
	@section ('title')
		Galeria
	@stop

	@section ('content')
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  			<!-- Indicators -->
  			<ol class="carousel-indicators">
    			<li data-target="#carousel-example-generic" data-slide-to="1" class="active"></li>
    			<li data-target="#carousel-example-generic" data-slide-to="2"></li>
    			<li data-target="#carousel-example-generic" data-slide-to="3"></li>
    			<li data-target="#carousel-example-generic" data-slide-to="4"></li>
    			<li data-target="#carousel-example-generic" data-slide-to="5"></li>
  			</ol>

  			<!-- Wrapper for slides -->
  			<div class="carousel-inner">
    			<div class="item active">
      				<img src="{{URL::asset('/images/image1.jpg')}}" alt="...">
      				<div class="carousel-caption"></div>
    			</div>
    			<div class="item">
      				<img src="{{URL::asset('/images/image2.jpg')}}" alt="...">
      				<div class="carousel-caption"></div>
    			</div>
    			<div class="item">
      				<img src="{{URL::asset('/images/image3.jpg')}}" alt="...">
      				<div class="carousel-caption"></div>
    			</div>
    			<div class="item">
      				<img src="{{URL::asset('/images/image4.jpg')}}" alt="...">
      				<div class="carousel-caption"></div>
    			</div>
    			<div class="item">
      				<img src="{{URL::asset('/images/image5.jpg')}}" alt="...">
      				<div class="carousel-caption"></div>
    			</div>
  		  	</div>

  			<!-- Controls -->
  			<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    			<span class="glyphicon glyphicon-chevron-left"></span>
  			</a>
  			<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    			<span class="glyphicon glyphicon-chevron-right"></span>
  			</a>
		</div>
	@stop
@stop