<?php

class DashboardController extends BaseController {

	public function Index()
	{

		$title = 'Dashboard';
		return View::make('dashboard')->with(array('title' => $title));
	}


	public function getLogout(){

		Sentry::logout();
		
		return Redirect::route('login');

	}

}
