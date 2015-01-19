<?php

class GroupController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$title = 'List';
		$groups = Sentry::findAllGroups();

		return View::make('group.group')->with(array ('title' => $title, 'groups' => $groups));

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
		return View::make('group.create')->with(array ('title' => $title));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//

		try
		{
			// Create the group
			$permission_array = array();
			$jsonText = Input::get('var');
			$decodedText = html_entity_decode($jsonText);
			$permission_array = json_decode($decodedText, true);

			if (empty($permission_array))
			{
				return Response::json(array('doLogin' => false, 'message' => 'Error', 'messageType' => 'At least select one permission.'));
			}

			$group = Sentry::createGroup(array(
				'name'        => Input::get('group'),
				'permissions' => $permission_array,
			));

		}
		catch (Cartalyst\Sentry\Groups\NameRequiredException $e)
		{
			return Response::json(array('doLogin' => false, 'message' => 'Error', 'messageType' => 'Name field is required.'));
		}
		catch (Cartalyst\Sentry\Groups\GroupExistsException $e)
		{
			return Response::json(array('doLogin' => false, 'message' => 'Error', 'messageType' => 'Group Already Exist.'));
		}

		return Response::json(array('doLogin' => true, 'message' => 'Success', 'messageType' => 'Group Created'));

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
		$title = 'Show Group';
		try
		{
			$group = Sentry::findGroupById($id);
		}
		catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e)
		{
			return Response::json(array('showGroup' => false, 'message' => 'Group Not Found', 'messageType' => 'danger'));
		}

		return View::make('group.show')->with(array('title' => $title, 'group' => $group));

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
			// Find the group using the group id
			$group = Sentry::findGroupById($id);

			// Delete the group
			$group->delete();
		}
		catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e)
		{
			return Response::json(array('deletedGroup' => false, 'message' => 'Group Not Found', 'messageType' => 'danger'));
		}
		return Response::json(array('bool' => true, 'message' => 'Deleted', 'messageType' => 'success'));

	}


}
