@extends('layouts.master')
@section('custom-css')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.css">
@stop
@section('section')
<div class="row">
  <div class="page-header">
    <ol class="breadcrumb">
      <li><a href="{{URL::route('group-list')}}">Group</a></li>
      <li>{{{ $title or 'Default' }}}</li>
    </ol>
  </div>
  <div class="col-md-8">
    <div class="panel panel-default">
      <div class="panel-heading">
        <div class="btn-group">
          <button id="desactivate-item" aria-label="Left Align" data-placement="bottom" title="Desactivate" class="btn btn-default"><span class="glyphicon glyphicon-minus-sign" aria-hidden="true"></span></button>
          <button id="delete-item" aria-label="Center Align" data-placement="bottom" title="Delete" class="btn btn-default"><span class="text-danger glyphicon glyphicon-trash" aria-hidden="true"></span></button>
          <button id="refresh" aria-label="Right Align" data-placement="bottom" title="Refresh" class="btn btn-default"><span class="text-info glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
        </div>
        <h4 class="pull-right text-info">Group List</h4>
      </div>
      <div class="panel-body">
        <table id="example" class="table table-striped table-bordered table-condensed " cellspacing="0" width="100%">
          <thead>
            <tr>
              <th style="text-align: center;"><input type="checkbox" class="check-all"></th>
              <th class="hidden-xs" style="text-align: center;">Id</th>
              <th style="text-align: center;">Name</th>
              <th style="text-align: center;">Permissions</th>

            </tr>
          </thead>
          <tbody>
            @foreach ($groups as $group)
            @if (!empty($group->id))
            <tr class="text-capitalize">
              <td style="text-align: center;">
                <input type="checkbox" data-group-id="{{ $group->getId(); }}">
              </td>
              <td style="text-align: center;" class="hidden-xs" style="text-align: center;">{{ $group->getId() }}</td>
              <td style="text-align: center;"><a href="groups/{{ $group->id }}">{{ $group->name }}<a/></td>
              <td style="text-align: center;" class=" hidden-xs"style="text-align: center;"><code>{{ json_encode($group->permissions) }}</code></td>
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
          <div class="modal-body">Are you sure you want to delete?</div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            <button type="button" class="btn btn-primary confirm-action">Yes</button>
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
  {{HTML::script('js/group.js')}}

@stop
