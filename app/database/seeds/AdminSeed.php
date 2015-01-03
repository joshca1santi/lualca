<?php

class AdminSeed extends Seeder
{

  public function run()
  {
    DB::table('users')->truncate();

    Sentry::createUser(array(
      'email'     => 'fural@admin.com',
      'password'  => 'fural',
      'first_name'=> 'Fernando',
      'last_name' => 'Lugo',
      'activated' => true,
    ));


  }

}
