@extends('layouts.master')
@section('section')
<div class="row">

<div class="page-header">
  <h2>{{{ $title or 'Default' }}}<small> new user </small></h2>
</div>
  <div class="col-lg-5 col-xs-8">
      {{ Form::open(array('url' => 'users/create', 'id' => 'create-user')) }}
    <p>
      {{ Form::label('email', 'Email Address') }}
      {{ Form::text('email', Input::old('email'), array('placeholder' => 'awesome@awesome.com', 'class' => 'form-control')) }}
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
    <p>{{ Form::submit('Create', array('class' => 'btn btn-lg btn-info')) }}</p>
    {{ Form::close() }}
  </div>
  <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
@stop

@section('custom-js')
{{HTML::script('js/user.js')}}
@stop
