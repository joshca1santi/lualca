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
      <h4><strong>Welcome</strong> to the Lualca Admin panel.</h4>
        <p>This is a basic template to edzit.</p>
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
