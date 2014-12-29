@extends('layouts.master')
@section('section')
<div class="row">

  <div class="page-header">
    <h2>{{{ $title or 'Default' }}}<small> new group </small></h2>
  </div>
  <div class="col-lg-5 col-xs-8">
    {{ Form::open(array('url' => 'group/create', 'id' => 'create-group')) }}
    <p>
      {{ Form::label('group', 'Group Name') }}
      {{ Form::text('group', Input::old('group'), array('placeholder' => 'Insert a name...', 'class' => 'form-control')) }}
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
{{HTML::script('js/group.js')}}
@stop
