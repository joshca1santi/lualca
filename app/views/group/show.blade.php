@extends('layouts.master')
@section('section')
<div class="row">
  <div class="col-lg-12">
    <div class="page-header">
      <ol class="breadcrumb">
        <li><a href="{{URL::route('dashboard')}}">Dashboard</a></li>
        <li>{{{ $title or 'Default' }}}</li>
      </ol>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title text-capitalize">{{$group->name}}</h3>
      </div>
      <div class="panel-body">

      </div>
      <div class="panel-footer">

      </div>
    </div>
  </div>
  <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
@stop

@section('custom-js')

<script type="text/javascript">
jQuery(document).ready(function($){


});
</script>
@stop
