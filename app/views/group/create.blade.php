@extends('layouts.master')
@section('section')
<div class="row">
  <div class="page-header">
    <ol class="breadcrumb">
      <li><a href="{{URL::route('group-list')}}">Group</a></li>
      <li>{{{ $title or 'Default' }}}</li>
    </ol>
  </div>
    <div class="col-md-5 col-xs-8">
      <div class="well well-sm">
        <!-- Form Name -->
        <legend class="text-info">Create a new group</legend>
      {{ Form::open(array('url' => 'group/create', 'id' => 'create-group')) }}
      <p>
        {{ Form::label('group', 'Group Name') }}
        {{ Form::text('group', Input::old('group'), array('placeholder' => 'Insert a name...', 'class' => 'form-control')) }}
      </p>
      <!-- Form Name -->
      <legend class="text-muted">Select Permissions</legend>
      <div style="max-height: 300px;overflow: auto;">
        <ul id="check-list-box" class="list-group checked-list-box">
          <li class="list-group-item" data-color="">Administrator</li>
          <li class="list-group-item" data-color="success">Security</li>
          <li class="list-group-item" data-color="success">Manager</li>
          <li class="list-group-item" data-color="success">Employee</li>
          <li class="list-group-item" data-color="success">Reader</li>
        </ul>
      </div>
<br>
  <p>{{ Form::submit('Create', array('class' => 'btn btn-outline btn-success')) }}</p>
  {{ Form::close() }}
</div>
</div>
  <div class="col-md-4">
    <button class="btn btn-outline btn-info col-xs-12" id="get-checked-data">Preview Group permissions</button>
    <pre id="display-json">
    </pre>

  </div>

<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
@stop

@section('custom-js')
{{HTML::script('js/group.js')}}
{{HTML::script('js/checkbox.js')}}
@stop
