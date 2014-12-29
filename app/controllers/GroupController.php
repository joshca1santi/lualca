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
			$group = Sentry::createGroup(array(
				'name'        => Input::get('group'),
				'permissions' => array(
					'admin' => 1,
					'users' => 1,
				),
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
