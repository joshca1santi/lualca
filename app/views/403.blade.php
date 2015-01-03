@extends('layouts.master')
@section('section')
<div class="row">
  <div class="col-lg-12">
    <div class="page-header">
      <ol class="breadcrumb">
        <li><a href="{{URL::route('dashboard')}}">Dashboard</a></li>
        <li>{{{ $title or '403' }}}</li>
      </ol>
    </div>
    <div class="alert alert-warning alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <a href="" class="alert-link">403</a>.Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
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
