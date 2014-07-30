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

Route::get('/signup', function()
{
	return View::make('signup');
})

Route::get('/login', function()
{
	return View::make('login');
})

Route::get('/logout', function()
{
	return View::make('logout');
})