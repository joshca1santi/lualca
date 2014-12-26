@extends('layouts.header')


  <div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">Please Sign In</h3>
          </div>
          <div class="panel-body">
            {{ Form::open(array('url' => 'login', 'id' => 'login')) }}
            <p>
              {{ Form::label('email', 'Email Address') }}
              {{ Form::text('email', Input::old('email'), array('placeholder' => 'awesome@awesome.com', 'class' => 'form-control')) }}
            </p>
            <p>
              {{ Form::label('password', 'Password') }}
              {{ Form::password('password', array('class' => 'form-control')) }}
            </p>
            <p>{{ Form::submit('Submit!', array('class' => 'btn btn-lg btn-info')) }}</p>
            {{ Form::close() }}
          </div>
        </div>
      </div>
    </div>
  </div>


  @section('custom-js')
  {{HTML::script('js/login.js')}}
  @stop
  
  @include('layouts.footer')
