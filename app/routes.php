<?php
Route::get('/', function()
{
 	return Redirect::route('dashboard');
});

Route::get('/blank', function()
{
	$title = 'Blank';
	return View::make('blank')->with('title',$title);
});

Route::get('/403', function()
{
  $title = '403';
  return View::make('403')->with('title',$title);
});




Route::group(array('before' => 'basicAuth||hasPermissions'), function()
{
	Route::get('dashboard', array(
		'as' => 'dashboard',
		'uses' => 'DashboardController@Index')
	);

	Route::get('logout', array(
		'as' => 'logout',
		'uses' => 'DashboardController@getLogout')
	);

});


/////////////////// LOGIN
Route::group(array('before' => 'notAuth'), function () {

	Route::get('login', array(
		'as' => 'login',
		'uses' => 'LoginController@index')
	);

	Route::post('login', array(
		'as' => 'login',
		'uses' => 'LoginController@store')
	);

});
////////////////////////////////////////

/////////////////// USER
Route::group(array('before' => 'basicAuth||isAdmin'), function()
{
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
  Route::put('users/{id}', array(
    'as' => 'activate-user',
    'uses' => 'UserController@update')
  );


});
////////////////////////////////////////




/////////////////// GROUP
Route::group(array('before' => 'basicAuth||isAdmin'), function()
{
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
});
////////////////////////////////////////

/////////////////// CONFIG
Route::group(array('before' => 'notAuth'), function () {
Route::get('config', array(
  'as' => 'config',
  'uses' => 'ConfigController@Index')
);

Route::post('config', array(
  'as' => 'config-seed',
  'uses' => 'ConfigController@seedDatabase')
);

Route::put('config', array(
  'as' => 'config-mig',
  'uses' => 'ConfigController@sentryMigration')
);

Route::patch('config', array(
  'as' => 'config-mig',
  'uses' => 'ConfigController@reset')
);

});
////////////////////////////////////////

/////////////////// GROUP
Route::group(array('before' => 'basicAuth||isAdmin'), function()
{

Route::get('parameters', array(
	'as' => 'parameters',
	'uses' => 'ParametersController@index')
);

});
////////////////////////////////////////
