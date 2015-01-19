<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>
    Lualca - {{{ $title or 'Default' }}}
  </title>
  {{HTML::style('css/flaty-bootstrap.min.css')}}
  <!-- Custom Fonts -->
  {{ HTML::style('font-awesome/css/font-awesome.min.css') }}
  <!-- Pnotify -->
  {{ HTML::style('css/pnotify.custom.min.css') }}
  @yield('custom-css')
</head>

<body>

<style media="screen">
  pre{
    color:#00BA76;
    background-color:white;
  }
</style>

<div class="container">
  <div class="page-header">
    <h1>Configuration <small>The way to start the system.</small></h1>
  </div>
  <div class="row text-center well">
    <div class="col-md-4 ">
      <div class="panel panel-default">
        <div class="panel-body">
          <p>
            <span class="label label-info">1</span>
          </p>
          <p>
            <label for="" class="text-info">Configure Database</label>
          </p>
          <p>
            Please, configurate the database in the following route and file
          </p>
          <p>
            <code>/app/config/database.php</code>
          </p>
        </div>

      </div>
        <p class="help-block">
          Example:
        </p>

        <pre  class="text-justify">
          'default' => 'pgsql',
        </pre>
        <pre class="text-justify">
          'pgsql' => array(
          'driver'   => 'pgsql',
          'host'     => 'localhost',
          'database' => 'DB_Lualca',
          'username' => 'lualca',
          'password' => 'lualca',
          'charset'  => 'utf8',
          'prefix'   => '',
          'schema'   => 'public',
          ),
        </pre>


    </div>



    <div class="col-md-4">

      <div class="panel panel-default">

        <div class="panel-body">

          <p>
            <span class="label label-info">2</span>
          </p>

          <p>
            <label for="" class="text-info">Install Database</label>
          </p>
          <p>
            <button type="button" id="myButton" data-loading-text="Loading..."
            class="btn btn-primary btn-block btn-lg" autocomplete="off">
            Migrate Sentry
          </button>
        </p>
        <p class="help-block">Install the database by default, creating the neccesary tables to operate.</p>

        </div>

      </div>

      <p class="help-block">
        This will create the following tables
      </p>
      <ul class="list-group text-uppercase">
        <li class="list-group-item">Groups</li>
        <li class="list-group-item">Migrations</li>
        <li class="list-group-item">Throttles</li>
        <li class="list-group-item">Users</li>
        <li class="list-group-item">Users_Groups</li>



      </ul>

    </div>






    <div class="col-md-4">
      <div class="panel panel-default">

        <div class="panel-body">
          <p>
            <span class="label label-info">3</span>
          </p>
          <p>
            <label for=""  class="text-info">Seed Database</label>

          </p>
          <p>
            <button type="button" id="myButton" data-loading-text="Loading..."
            class="btn btn-primary btn-block btn-lg" autocomplete="off">
            Default Seed
          </button>
        </p>

        <p class="help-block">Create the users and groups by default.</p>

        </div>

      </div>
      <p class="help-block">
        This will create the following User
      </p>

        <code>fural@admin.com</code>
        <p class="help-block">
          the default password is:
        </p>
        <code>fural</code>
        <p class="help-block">
          also this will create the group:
        </p>
        <code>Admin</code>
    </div>

  </div>
</div>


@section('custom-js')
{{HTML::script('')}}
@stop

  @include('layouts.footer')
