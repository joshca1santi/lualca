<?php

class ConfigController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//

		return View::make('config');

	}

	public function sentryMigration(){
		define('STDIN',fopen("php://stdin","r"));

		try{
				Artisan::call('migrate', array('--package' => 'cartalyst/sentry', '--force' => true));
			}
		catch (Exception $e) {
		//	return View::make('config')->with(array('response'=>false, 'error' => $e));;
		}

		return View::make('config')->with('response', 2);;

	}
	public function reset(){
		try{
			Artisan::call('migrate:reset', array('--force' => true));		}
			catch (Exception $e) {
				return View::make('config')->with(array('response'=>false, 'error' => $e));;
			}

			return View::make('config')->with('response', 3);;
	}

	public function seedDatabase(){

			define('STDIN',fopen("php://stdin","r"));

			try{
				//Artisan::call('migrate', array('--package' => 'cartalyst/sentry', '--force' => true));

				Artisan::call('db:seed', array('--force' => true));
			}
			catch (Exception $e) {
				return View::make('config')->with(array('response'=>false, 'error' => $e));;
			}

		return View::make('config')->with('response', 1);;

	}




	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
