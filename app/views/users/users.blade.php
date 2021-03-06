@extends('layouts.master')
@section('custom-css')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.css">
@stop
@section('section')
<div class="row">
  <div class="page-header">
    <ol class="breadcrumb">
      <li><a href="{{URL::route('users')}}">Users</a></li>
      <li>{{{ $title or 'Default' }}}</li>
    </ol>
  </div>

  <div class="col-md-12">
<div class="panel panel-primary">
  <div class="panel-heading">
  <div class="btn-group">
    <button id="activate-item" aria-label="Left Align" data-placement="bottom" title="Desactivate" class="btn btn-default"><span class="glyphicon glyphicon-minus-sign" aria-hidden="true"></span></button>
    <button id="delete-item" aria-label="Center Align" data-placement="bottom" title="Delete" class="btn btn-default"><span class="text-danger glyphicon glyphicon-trash" aria-hidden="true"></span></button>
    <button id="refresh" aria-label="Right Align" data-placement="bottom" title="Refresh" class="btn btn-default"><span class="text-info glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
  </div>
  <h4 class="pull-right">User List</h4>

  </div>
  <div class="panel-body">
    <table id="example" class="table table-striped table-bordered table-condensed" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th class="col-lg-1" style="text-align: center;"><input type="checkbox" class="check-all"></th>
          <th class="col-lg-1 hidden-xs" style="text-align: center;">Id</th>
          <th style="text-align: center;">Email</th>
          <th style="text-align: center;">Name</th>
          <th style="text-align: center;">Status</th>
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
            <td style="text-align: center;" class="text-capitalize">{{ $user->first_name.' '.$user->last_name  }}</td>
            <?php
            $throttle = Sentry::findThrottlerByUserId($user->getId());
            if($banned = $throttle->isBanned())
            {
            ?>
                <td style="text-align: center;">Banned</td>
            <?php
            }
            else
            {
            ?>  <td style="text-align: center;">Active</td>
            <?php
            }
            ?>
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
              <h4 class="modal-title">Confirmation</h4>
            </div>
            <div class="modal-body">Are you sure you want to delete the user(s)?</div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
              <button type="button" class="btn btn-primary confirm-action">Yes</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="confirm-modal2" tabindex="-1" role="dialog" aria-labelledby="confirm-modal" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">Confirmation</h4>
            </div>
            <div class="modal-body">Are you sure you want to ban/unban the user(s)?</div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
              <button type="button" class="btn btn-primary confirm-action2">Yes</button>
            </div>
          </div>
        </div>
      </div>

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
