<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('index');
});

Route::get('/nosotros', function()
{
	return View::make('nosotros');
});

Route::get('/hacemos', function()
{
	return View::make('hacemos');
});

Route::get('/galeria', function()
{
	return View::make('galeria');
});

Route::get('/experiencias', function()
{
	return View::make('experiencias');
});

Route::get('/contacto', function()
{
	return View::make('contacto');
});

Route::get('/signup',
	array(
		'before'=>'guest',
		function(){
			return View::make('signup');
		}
	)
);

Route::post('/signup',
	array(
		'before'=>'csrf',
		function(){
			$user=new User;
			$user->email = Input::get('email');
			$user->password = Hash::make(Input::get('password'));
			$user->name= Input::get('name');
			$user->last_name= Input::get('last_name');
			$user->phone= Input::get('phone');
			$user->university= Input::get('university');
			$user->university_id= Input::get('university_id');
			$user->major= Input::get('major');
			$user->semester= Input::get('semester');

			try{
				$user->save();
			}
			catch (Exception $e){
				return Redirect::to('/signup')
					->with('flash_message','No se puedo crear la cuenta, intenta de nuevo')
					->withInput();
			}

			Auth::login($user);

			return Redirect::to('/user_home')
					->with('flash_message','Bienvenido');
		}
	)
);

Route::get('/login',
	array(
		'before'=>'guest',
		function(){
			return View::make('login');	
		}
	)
);

Route::post('/login',
	array(
		'before'=>'csrf',
		function(){
			$credentials= Input::only('email', 'password');

			if(Auth::attempt($credentials, $remember=true)){
				return Redirect::intended('/')
						-> with('flash_message', 'Bienvenido!');
			}
			else{
				return Redirect::to('/login')
						->with('flash_message','No se ha podido conectar, por favor intente nuevamente');
			}
			return Redirect::to('login');
		}
	)
);

Route::get('/logout', function()
{
	Auth::logout();
	return Redirect::to('/');
});

Route::get('mysql-test', function() {

    # Use the DB component to select all the databases
    $results = DB::select('SHOW DATABASES;');

    # If the "Pre" package is not installed, you should output using print_r instead
    return Pre::render($results);

});

Route::get('/user_home',
	array(
		'before'=>'auth',
		 function(){
			return View::make('user_home');
		}
	)
);