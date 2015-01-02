@extends('layouts.master')
@section('section')
<div class="row">

  <div class="page-header">
    <ol class="breadcrumb">
      <li><a href="{{URL::route('users')}}">Users</a></li>
      <li>{{{ $title or 'Default' }}}</li>
    </ol>
  </div>

  <div class="col-lg-5 col-xs-8">
    <div class="well well-sm">
      <!-- Form Name -->
      <legend class="text-info">Create a new user</legend>
      {{ Form::open(array('url' => 'users/create', 'id' => 'create-user')) }}
    <p>
      {{ Form::label('email', 'Email Address') }}
      {{ Form::text('email', Input::old('emails'), array('placeholder' => 'awesome@awesome.com', 'class' => 'form-control')) }}
    </p>
    <p>
      {{ Form::label('password', 'Password') }}
      {{ Form::password('password', array('class' => 'form-control')) }}
    </p>
<!--    <p>
      {{ Form::label('rpassword', 'Repeat-password') }}
      {{ Form::password('password', array('class' => 'form-control')) }}
    </p>
-->
    <p>{{ Form::submit('Create', array('class' => 'btn btn-success')) }}</p>
    {{ Form::close() }}
    </div>
  </div>
  <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
@stop

  @section('custom-js')
    {{HTML::script('js/user.js')}}
  @stop
