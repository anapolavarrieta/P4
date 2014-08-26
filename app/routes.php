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
date_default_timezone_set ("America/Mexico_City");

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
	return View::make('underconstruction');
});

Route::get('/experiencias', function()
{
	return View::make('experiencias');
});

Route::get('/contacto', function()
{
	return View::make('contacto');
});

Route::post('/contacto',
	array(
	
	function(){
		$name= Input::get('client');
		$email= Input::get('email');
		$phone= Input::get('phone');
		$message=Input::get('message');
		
		$user= array(
			'email'=>$email,
			'name'=>$name,
		);

		$data = array(
			'email'=>$email,
			'name'=>$name,
			'phone'=>$phone,
			'detail'=>$message
		);

		Mail::send('mailcontacto', $data, function($message) use($data)
		{
			$message->to('anapolavarrieta@gmail.com', 'Ana Paula')
					->subject('Nueva información de contacto');
		});

		return View::make('gracias');
	})
);

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
			$rules =array(
				'email'=> 'required|email|unique:users,email',
				'password' => 'required|min:5',
				'name'=> 'min:3',
				'last_name'=> 'min:3',
				'university_id' => 'integer'
			);

			$validator= Validator::make(Input::all(), $rules);
			if($validator->fails()){
				return Redirect::to('/signup')
								->with('flash_message', 'No se pudo crear la cuenta. Favor de corregir los siguientes errores')
								->withInput()
								->withErrors($validator);
			}

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

			if(Auth::attempt($credentials, $remember=true)) {
				$user= User::find(Auth::id());
				if($user->admin !=1){
					return Redirect::intended('/user_home')
							-> with('flash_message', 'Bienvenido!');
				}
				else{
					return Redirect::to('/admin')
							->with('flash_message', 'Bienvenido');
				}
			}
			else{
				return Redirect::to('/login')
						->with('flash_message','No se ha podido conectar, por favor intente nuevamente');
			}
			return Redirect::to('user_home');
		}
	)
);

Route::get('/logout', function()
{
	Auth::logout();
	return Redirect::to('/');
});

Route::get('password/reset', array(
  'uses' => 'RemindersController@getRemind',
  'as' => 'passwordremind'
));

Route::post('password/reset', array(
  'uses' => 'RemindersController@postRemind',
  'as' => 'passwordrequest'
));

Route::get('password/reset/{token}', array(
  'uses' => 'RemindersController@getReset',
  'as' => 'password.reset'
));

Route::post('password/reset/{token}', array(
  'uses' => 'RemindersController@postReset',
  'as' => 'password.update'
));

Route::get('/user_home',
	array(
		'before'=>'auth',
		 function(){
			return View::make('user_home');
		}
	)
);

Route::post('/entry',function()
{
	$user= User::find(Auth::id());
	$register=new Register();
	$register->latitude=Input::get('latitude');
	$register->longitude=Input::get('longitude');
	$flag= "Se ha registrado tu entrada";
	if(($register->latitude <= 19.29) && ($register->latitude>=19.27) && ($register->longitude <=-99.15) && ($register->longitude>= -99.17)){
		$register->type='entry';
	}
	elseif($register->latitude == 0 && $register->longitude == 0){
		$register->type='error en direccion';
		$flag= "Para poder registrar tu entrada es necesario habilitar la opción Share Location";
	}
	else{
		$register->type='other_entry';
	}
	$register->date= date("Y-m-d");
	$register->time= date("G:i:s");
	$register->user()->associate($user);
	$register->save(); 
 	return View::make('entry')->with ('flag', $flag);
});

Route::post('/exit',function()
{
	$user= User::find(Auth::id());
	$register=new Register();
	$register->latitude=Input::get('latitude2');
	$register->longitude=Input::get('longitude2');
	$flag= "Se ha registrado tu salida";
	if(($register->latitude <= 19.29) && ($register->latitude>=19.27) && ($register->longitude <=-99.15) && ($register->longitude>= -99.17)){
			$register->type='exit';
	}
	elseif($register->latitude == 0 && $register->longitude == 0){
		$register->type='error en direccion';
		$flag= "Para poder registrar tu salida es necesario habilitar la opción Share Location";
	}
	else{
		$register->type='other_exit';
	}
	$register->date= date("Y-m-d");
	$register->time= date("G:i:s");
	$register->user()->associate($user);
	$register->save(); 
 	return View::make('exit')->with ('flag', $flag);
});

Route::get('/proyecto', function()
{
	return View::make('underconstruction');
});

Route::get('/admin',
	array(
		'before'=>'aut|admin',
		 function(){
		 		$users= User::all();
		 		return View::make('admin')->with('users',$users);
			}
	)
);

Route::get('/users_hours',
	array(
		'before'=>'auth|admin',
		function(){
			$users= User::all();
			return View::make('users_hours')->with('users',$users);
		}
	)
);

Route::get('/userhours/{id}', 
	array(
		'before'=>'auth|admin',
		function($id){
			$user= User::findOrFail($id);
			$first_reg= $user->register()->first();
			try{
				$date1= $first_reg->date;
				$hour1= $first_reg->time;
				return View::make('userhours')
						->with('user', $user)
						->with('date1', $date1)
						->with ('hour1', $hour1);
			}
			catch (Exception $e){
				return Redirect::to('/users_hours')
					->with('flash_message','El usuario no tiene registros');
			}
		}
	)
);

Route::get('/edit_user/{id}', 
	array(
		'as'=>'user.update',
		'before'=>'auth',
		function($id){
			$user= User::findOrFail($id);
			return View::make('edit_user')
					->with('user', $user);
		}
	)
);

Route::post('/edit_user/{id}',
	array(
		'before'=>'csrf',
		function($id){
			$user=User::findorFail($id);
			$user->fill(Input::all());
			$user->save();
			return Redirect::to('/admin')
							->with('flash_message','Los cambios se han guardado');
		}
	)
);

Route::get('/delete_user/{id}', 
	array(
		'before'=>'auth|admin',
		function($id){
			$user= User::findOrFail($id);
			foreach($user->register as $register){
				$register->delete();
			}
			$user->delete();
			return Redirect::to('/admin')
						->with('flash_message','El usuario se ha eliminado');

		}
	)
);

Route::get('/paginas', function()
{
	return View::make('paginas');
});


Route::get('mysql-test', function() {

    # Use the DB component to select all the databases
    $results = DB::select('SHOW DATABASES;');

    # If the "Pre" package is not installed, you should output using print_r instead
    return Pre::render($results);

});

Route::get('/debug', function() {

    echo '<pre>';

    echo '<h1>environment.php</h1>';
    $path   = base_path().'/environment.php';

    try {
        $contents = 'Contents: '.File::getRequire($path);
        $exists = 'Yes';
    }
    catch (Exception $e) {
        $exists = 'No. Defaulting to `production`';
        $contents = '';
    }

    echo "Checking for: ".$path.'<br>';
    echo 'Exists: '.$exists.'<br>';
    echo $contents;
    echo '<br>';

    echo '<h1>Environment</h1>';
    echo App::environment().'</h1>';

    echo '<h1>Debugging?</h1>';
    if(Config::get('app.debug')) echo "Yes"; else echo "No";

    echo '<h1>Database Config</h1>';
    print_r(Config::get('database.connections.mysql'));

    echo '<h1>Test Database Connection</h1>';
    try {
        $results = DB::select('SHOW DATABASES;');
        echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
        echo "<br><br>Your Databases:<br><br>";
        print_r($results);
    } 
    catch (Exception $e) {
        echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
    }

    echo '</pre>';

});

Route::get('/get-environment',function() {

    echo "Environment: ".App::environment();

});

Route::get('/trigger-error',function() {

    # Class Foobar should not exist, so this should create an error
    $foo = new Foobar;

});