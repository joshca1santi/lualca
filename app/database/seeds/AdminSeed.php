<?php

class AdminSeed extends Seeder
{

  public function run()
  {
    DB::table('users')->delete();
    Sentry::createUser(array(
      'email'     => 'lualca@lualca.com',
      'password'  => 'lualca',
      'activated' => true,
    ));
  }

}
