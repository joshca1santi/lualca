@include('layouts.header')
<div class="container">
  <div class="page-header">
    <h1>Configuration <small>The way to start the system.</small></h1>
  </div>
  @if (isset($response) && $response === 1)
    <div class="alert alert-success"><strong>Succcess! </strong>The database is seed.</div>
    @endif
  @if (isset($response) && $response === 2)
    <div class="alert alert-info"><strong>Succcess! </strong>The database has been created.</div>
    @endif
  @if (isset($response) && $response === 3)
    <div class="alert alert-warning"><strong>Succcess! </strong>All the changes has beed reset.</div>
    @endif
  @if(!Empty($error))
    <div class="alert alert-danger"><strong>Status! </strong>
      {{$error}}
      </div>
  @endif

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
            {{ Form::open(array('url' => 'config', 'id' => 'migration', 'method' => 'put', 'action' => 'ConfigController@sentryMigration')) }}
            <p>
              {{ Form::submit('Submit!', array('id' => 'migration-button', 'class' => 'btn btn-primary btn-block btn-lg', 'data-loading-text' => 'Migrating...')) }}
            </p>
            {{ Form::close() }}
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
          {{ Form::open(array('url' => 'config', 'id' => 'config', 'method' => 'post', 'action' => 'ConfigController@seedDatabase')) }}
          <p>
          {{ Form::submit('Submit!', array('id' => 'seed-button', 'class' => 'btn btn-primary btn-block btn-lg', 'data-loading-text' => 'Seeding...')) }}
        </p>
        {{ Form::close() }}
        <p class="help-block">Create the users and groups by default.</p>
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-body">
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
  </div>
  <div class="row">
    <div class="col-md-12">
      {{ Form::open(array('url' => 'config', 'id' => 'reset', 'method' => 'PATCH', 'action' => 'ConfigController@reset')) }}
      {{ Form::submit('Reset', array('id' => 'migration-button', 'class' => 'btn btn-danger btn-block btn-lg', 'data-loading-text' => 'Reseting...')) }}
      {{ Form::close() }}
    </div>
  </div>

</div>

<!-- jQuery -->
{{HTML::script('js/jquery.js')}}
<!-- Bootstrap Core JavaScript -->
{{HTML::script('js/bootstrap.min.js')}}

</body>
</html>
