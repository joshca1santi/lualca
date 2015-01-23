<?php

class AdminSeed extends Seeder
{

  public function run()
  {

    DB::table('users')->truncate();
    DB::table('groups')->truncate();
    DB::table('users_groups')->truncate();
    DB::table('throttle')->truncate();

  $admin = Sentry::createUser(array(
    'email'     => 'fural@admin.com',
    'password'  => 'fural',
    'first_name'=> 'Fernando',
    'last_name' => 'Lugo',
    'activated' => true,
  ));

  $manager = Sentry::createUser(array(
    'email'     => 'manager@admin.com',
    'password'  => '123123',
    'first_name'=> 'Manager',
    'last_name' => 'Test',
    'activated' => true,
  ));

  Sentry::createGroup(array(
    'name'        => 'Admin',
    'permissions' => array(
      'admin' => 1
    ),
  ));

  Sentry::createGroup(array(
    'name'        => 'Manager',
    'permissions' => array(
      'manager' => 1
    ),
  ));

  $adminGroup   = Sentry::findGroupByName('Admin');
  $managerGroup = Sentry::findGroupByName('Manager');

  $admin->addGroup($adminGroup);
  $manager->addGroup($managerGroup);




  }

}
