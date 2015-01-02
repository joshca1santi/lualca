@extends('layouts.master')
@section('section')
<div class="row">
  <div class="page-header">
    <ol class="breadcrumb">
      <li><a href="{{URL::route('group-list')}}">Group</a></li>
      <li>{{{ $title or 'Default' }}}</li>
    </ol>
  </div>
    <div class="col-md-5">
      <div class="well well-sm">
        <!-- Form Name -->
        <legend class="text-info">Create a new group</legend>
      {{ Form::open(array('url' => 'group/create', 'id' => 'create-group')) }}
      <p>
        {{ Form::label('group', 'Group Name') }}
        {{ Form::text('group', Input::old('group'), array('placeholder' => 'Insert a name...', 'class' => 'input-lg form-control')) }}
        {{ Form::text('var', Input::old('var'), array('placeholder' => '', 'id' => 'var', 'class' => 'form-control hidden')) }}

      </p>
      <!-- Form Name -->
      <legend class="text-info">Select Permissions</legend>
      <span id="helpBlock" class="help-block">You should choose at least one permission to create a new group.</span>
      <div style="max-height: 300px;overflow: auto;">
        <ul id="check-list-box" class="list-group checked-list-box">
          <li class="list-group-item" name='admin' id='Administrator' data-color="">Administrator</li>
          <li class="list-group-item" name='security' data-color="success">Security</li>
          <li class="list-group-item" name='manager' data-color="success">Manager</li>
          <li class="list-group-item" name='employee' data-color="success">Employee</li>
          <li class="list-group-item" name='reader' data-color="success">Reader</li>
        </ul>
      </div>
<br>
  <p>{{ Form::submit('Create', array('class' => 'btn btn-success')) }}</p>
  {{ Form::close() }}
</div>
</div>
  <div class="col-md-6">
    <div class="panel panel-info">
      <div class="panel-heading">
        <h3 class="panel-title">Permission Helper</h3>
      </div>
      <div class="panel-body">

        <div class="panel-body">
          <!-- Nav tabs -->
          <ul class="nav nav-tabs">
            <li class="active"><a href="#admin_help" data-toggle="tab">Admin</a>
            </li>
            <li><a href="#profile" data-toggle="tab">Security</a>
            </li>
            <li><a href="#messages" data-toggle="tab">Manager</a>
            </li>
            <li><a href="#settings" data-toggle="tab">Employee</a>
            </li>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content">
            <div class="tab-pane fade in active" id="admin_help">
              <h4>Admin</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
            <div class="tab-pane fade" id="profile">
              <h4>Profile Tab</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
            <div class="tab-pane fade" id="messages">
              <h4>Messages Tab</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
            <div class="tab-pane fade" id="settings">
              <h4>Settings Tab</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="panel-footer">

      </div>
    </div>

  </div>

<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
@stop

@section('custom-js')
{{HTML::script('js/group.js')}}
{{HTML::script('js/checkbox.js')}}
@stop
