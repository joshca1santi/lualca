<?php


class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function index()
	{
		$title = 'List';
		$users = Sentry::findAllUsers();
		return View::make('users.users')->with(array ('title' => $title, 'users' => $users));

	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		$title = 'Create';
		$groups = Sentry::findAllGroups();

		return View::make('users.create')->with(array ('title' => $title, 'groups' => $groups));
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
			//Validation rules array key user
			$rules =  Config::get('validation.user');
			//getting all inputs from the form
			$validator = Validator::make(Input::all(), $rules);
			//if there is some error then response false
			if($validator->fails() ) {
				return Response::json(array('bool' => false, 'errorMessages' => $validator->messages()));
			}

			$group_array = array();
			$jsonText = Input::get('var');
			$decodedText = html_entity_decode($jsonText);
			$group_array = json_decode($decodedText, true);

			if (empty($group_array))
				return Response::json(array('bool' => false, 'message' => 'Error', 'messageType' => 'At least select one Group.'));

			/** Creating the user ***************************************/
			$user = Sentry::createUser(array(
				'email'    => Input::get('email'),
				'password' => Input::get('password'),
				'first_name'    => Input::get('first_name'),
				'last_name'    => Input::get('last_name'),
				'activated' => true,
			));

			if(isset($group_array) && is_array($group_array) && !empty($group_array)) {
				foreach($group_array as $groupId) {
					$group = Sentry::findGroupById(intval($groupId));
					$user->addGroup($group);
				}
			}
			/**********************************************************/
		}
		catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
		{
			return Response::json(array('bool' => false, 'message' => 'Error', 'messageType' => 'Login field is required.'));
		}
		catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
		{
			return Response::json(array('bool' => false, 'message' => 'Error', 'messageType' => 'Password field is required.'));
		}
		catch (Cartalyst\Sentry\Users\UserExistsException $e)
		{
			return Response::json(array('bool' => false, 'message' => 'Error', 'messageType' => 'User with this login already exists.'));
		}
		catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e)
		{
			return Response::json(array('bool' => false, 'message' => 'Error', 'messageType' => 'Group was not found.'));
		}


		return Response::json(array('bool' => true, 'message' => 'Success', 'messageType' => 'User Created'));

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		try {
		//Find the user By
		$mode = 'id';
		switch($mode){
			case 'id':
				$user = Sentry::findUserById($id);
			break;
			case 'login':
				$user = Sentry::findUserByLogin($id);
			break;
		}
	}
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
			return Response::json(array('bool' => false, 'message' => 'User Not Found', 'messageType' => 'danger'));
		}

		return View::make('users.show')->with(array ('user' => $user));

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
		try
		{
			// Find the user using the user id
			$user = Sentry::findUserById($id);
			// Delete the user
			$user->delete();
		}
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
			return Response::json(array('bool' => false, 'message' => 'User Not Found', 'messageType' => 'danger'));
		}
		return Response::json(array('bool' => true, 'message' => 'Deleted', 'messageType' => 'success'));
	}


}
