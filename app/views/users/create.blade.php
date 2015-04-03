@extends('layouts.master')
@section('section')
<div class="row">

  <div class="page-header">
    <ol class="breadcrumb">
      <li><a href="{{URL::route('users')}}">Users</a></li>
      <li>{{{ $title or 'Default' }}}</li>
    </ol>
  </div>

  <div class="col-md-8 col-md-offset-2 col-sm-6">
    <div class="well well-sm">
      <!-- Form Name -->
      <legend class="text-info">Create a new user</legend>
      {{ Form::open(array('url' => 'users/create', 'id' => 'create-user')) }}
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            {{ Form::label('first_name', 'First Name') }}
            {{ Form::text('first_name','', array('placeholder' => 'First Name', 'class' => 'input-lg form-control')) }}
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
          {{ Form::label('last_name', 'Last Name') }}
          {{ Form::text('last_name','', array('placeholder' => 'Last Name', 'class' => 'input-lg form-control')) }}
        </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            {{ Form::label('email', 'Email Address') }}
            {{ Form::text('email', Input::old('emails'), array('placeholder' => 'awesome@awesome.com', 'class' => 'form-control')) }}
          </div>
        </div>

      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            {{ Form::label('password', 'Password') }}
            {{ Form::password('password', array('class' => 'form-control')) }}
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            {{ Form::label('password_confirmation', 'Repeat Password') }}
            {{ Form::password('password_confirmation', array('class' => 'form-control')) }}
          </div>
        </div>
      </div>
    <div class="row">
      <div class="col-md-10 col-md-offset-1">

        <div class="form-group text-capitalize">
          <legend class="text-info">Select Groups</legend>
          <span id="helpBlock" class="help-block">You should choose at least one group to create a new user.</span>
          <div style="max-height: 160px;overflow: auto;">
            <ul id="check-list-box-user" class="list-group checked-list-box">
              @foreach($groups as $group)
              <li class="list-group-item" id="{{ $group->getId() }}" name="{{ $group->getId() }}" value="{{ $group->getId() }}" data-color="success">{{ $group->getName() }}</li>
              @endforeach
            </ul>
          </div>
        </div>
        {{ Form::text('var', Input::old('var'), array('placeholder' => '', 'id' => 'var', 'class' => 'form-control hidden')) }}

      <!--  <pre id="display-json"></pre> -->
      </div>
    </div>
    <p>{{ Form::submit('Create', array('class' => 'btn btn-lg btn-success')) }}</p>
    {{ Form::close() }}
    </div>
  </div>
  <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
@stop

  @section('custom-js')
    {{HTML::script('js/user/user.js')}}
    {{HTML::script('js/checkbox.js')}}
  @stop
