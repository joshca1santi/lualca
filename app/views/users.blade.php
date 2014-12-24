@extends('layouts.master')
@section('custom-css')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.css">
@stop
@section('section')
<div class="row">
  <div class="col-lg-12">
    <h2 class="page-header">{{{ $title or 'Default' }}}</h2>

      <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>id</th>
            <th>Email</th>
            <th>Activated</th>
            <th>Last Login</th>
          </tr>
        </thead>
        <tbody>

            @foreach ($users as $user)
            @if (!empty($user->id))
            <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ boolval($user->activated) ? 'True' : 'False' }}</td>
            <td>{{ $user->last_login }}</td>
            @endif
          </tr>
            @endforeach


        </tbody>
      </table>
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
} );
</script>

@stop
