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


Route::get('dashboard', array(
	'as' => 'dashboard',
	'uses' => 'DashboardController@Index')
);

/////////////////// LOGIN
Route::get('login', array(
	'as' => 'login',
	'uses' => 'LoginController@index')
);
Route::post('login', array(
	'as' => 'login',
	'uses' => 'LoginController@store')
);
////////////////////////////////////////

/////////////////// USER
	Route::get('users', array(
		'as' => 'users',
		'uses' => 'UserController@index')
	);
	Route::get('users/create', array(
		'as' => 'create-user',
		'uses' => 'UserController@create')
	);
	Route::post('users/create', array(
		'as' => 'create-user',
		'uses' => 'UserController@store')
	);
	Route::get('users/{id}', array(
		'as' => 'show-user',
		'uses' => 'UserController@show')
	);
	Route::delete('users/{id}', array(
		'as' => 'delete-user',
		'uses' => 'UserController@destroy')
	);
////////////////////////////////////////



/////////////////// GROUP
Route::get('group', array(
	'as' => 'group-list',
	'uses' => 'GroupController@index')
);
Route::get('group/create', array(
	'as' => 'create-group',
	'uses' => 'GroupController@create')
);
Route::post('group/create', array(
	'as' => 'create-group',
	'uses' => 'GroupController@store')
);
Route::get('group/{id}', array(
	'as' => 'show-group',
	'uses' => 'GroupController@show')
);
Route::delete('group/{id}', array(
	'as' => 'delete-group',
	'uses' => 'GroupController@destroy')
);
////////////////////////////////////////
