@extends('layouts.master')
@section('custom-css')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.css">
@stop
@section('section')
<div class="row">
  <div class="page-header">
    <h2>{{{ $title or 'Default' }}} <small>of users</small></h2>
  </div>
  <div class="col-lg-8 col-lg-offset-2">
<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title"></h3>
  </div>
  <div class="panel-body">
    <table id="example" class="table table-striped table-bordered table-condensed" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th class="col-lg-1" style="text-align: center;"><input type="checkbox" class="check-all"></th>
          <th class="col-lg-1 hidden-xs" style="text-align: center;">Id</th>
          <th style="text-align: center;">Email</th>
          <th style="text-align: center;">Activated</th>
          <th style="text-align: center;" class="hidden-xs">Last Login</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
        @if (!empty($user->id))
        <tr>
          <td style="text-align: center;">
            <input type="checkbox" data-user-id="{{ $user->getId(); }}">
          </td>
          <td class="hidden-xs" style="text-align: center;">{{ $user->getId() }}</td>
          <td style="text-align: center;"><a href="users/{{ $user->id }}">{{ $user->email }}<a/></td>
            <td style="text-align: center;">{{ boolval($user->activated) ? 'True' : 'False' }}</td>
            <td style="text-align: center;" class="hidden-xs">{{{ $user->last_login or 'Never' }}}</td>
            @endif
          </tr>
          @endforeach
        </tbody>
      </table>
  </div>
  <div class="panel-footer">

  </div>
</div>

      <div class="modal fade" id="confirm-modal" tabindex="-1" role="dialog" aria-labelledby="confirm-modal" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">aa</h4>
            </div>
            <div class="modal-body">bb</div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('syntara::all.no') }}</button>
              <button type="button" class="btn btn-primary confirm-action">{{ trans('syntara::all.yes') }}</button>
            </div>
          </div>
        </div>
      </div>
      <a id="delete-item" class="btn btn-danger">Delete</a>

  </div>
  <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
@stop

@section('custom-js')
<script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="//cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.js"></script>
<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
  $('#example').dataTable();
});
</script>
{{HTML::script('js/user.js')}}
@stop
