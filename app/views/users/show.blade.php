@extends('layouts.master')

@section('section')
<div class="row">
  <div class="page-header">
    <h2>{{{ $title or 'Default' }}}<small> user</small></h2>
  </div>
  <div class="col-md-6">
    <div class="panel panel-info">
      <div class="panel-heading">
        <h3 class="panel-title">Profile <strong class="text-muted">{{$user->email}}</strong></h3>
      </div>
      <div class="panel-body">
        <div class="form-group">
          <label for="last_login">Last Login:</label>
          <input type="text" name="last_login" class="form-control" disabled value="{{{ $user->last_login or 'Never' }}}">
        </div>
        <div class="form-group">
          <label for="activated">Activated</label>
          <input type="text" name="activated" class="form-control" disabled value="{{ boolval($user->activated) ? 'True' : 'False' }}">
        </div>
      </div>
      <div class="panel-footer">
      </div>
    </div>
  </div>
</div>
<!-- /.row -->
@stop

@section('custom-js')

{{HTML::script('js/user.js')}}

@stop
