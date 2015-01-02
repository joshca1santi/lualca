<?php

class LoginController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
 	private $title = 'Login';

	public function index()
	{

		return View::make('login')->with('title',$this->title);
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
		try
		{
/*
			$rules = array(
				'email'    => 'required|email', // make sure the email is an actual email
				'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
			);
*/
			// run the validation rules on the inputs from the form
			$credentials = array(
				'email'    => Input::get('email'),
				'password' => Input::get('password'),
			);
/*
			if ($credentials['email'] == 'lualca@lualca.com')
			{

				$user = Sentry::findUserByLogin('lualca@lualca.com');
				$throttle = Sentry::findThrottlerByUserId($user->id);
				if($banned = $throttle->isBanned())
				{
					$throttle->unBan();
				}
			}
*/

			// Authenticate the user
			$user = Sentry::authenticate($credentials, false);
		}

		catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
		{
			return Response::json(array(
      'doLogin' => false,
      'message' => 'Error',
      'messageType' =>'Login Required',
      'icon' =>'glyphicon glyphicon-envelope'));
		}
		catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
		{
			return Response::json(array('doLogin' => false, 'message' => 'Error', 'messageType' => 'Password Required'));
		}
		catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
		{
			return Response::json(array('doLogin' => false, 'message' => 'Error', 'messageType' => 'Wrong Password'));
		}
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
			return Response::json(array('doLogin' => false, 'message' => 'Error', 'messageType' => 'User Not Found'));
		}
		catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
		{
			return Response::json(array('doLogin' => false, 'message' => 'Error', 'messageType' => 'User Not Activated'));
		}

		// The following is only required if the throttling is enabled
		catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e)
		{
			return Response::json(array('doLogin' => false, 'message' => 'Error', 'messageType' => 'User Suspended'));
		}
		catch (Cartalyst\Sentry\Throttling\UserBannedException $e)
		{
			return Response::json(array('doLogin' => false, 'message' => 'Error', 'messageType' => 'User Banned'));
		}

    Sentry::login($user, false);

		return Response::json(array('doLogin' => true, 'message' => 'welcome', 'messageType' => 'hi'));
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
