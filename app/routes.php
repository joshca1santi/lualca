<?php
Route::get('/', function()
{
	return View::make('blank');
});

Route::get('/blank', function()
{
	$title = 'Blank';
	return View::make('blank')->with('title',$title);
});

Route::resource('dashboard', 'DashboardController');
Route::resource('login', 'LoginController');

Route::resource('users', 'UserController');

/// LOGIN MODULE
/*
Route::get('/login', function()
{
$title = 'Login';
return View::make('login')->with('title',$title);
});
*/
