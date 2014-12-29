@extends('layouts.master')
@section('section')
<div class="row">
  <div class="col-lg-12">
    <div class="page-header">
      <h2>{{{ $title or 'Default' }}} <small></small></h2>
    </div>
      <h4><strong>Welcome</strong> to the Lualca Admin panel.</h4>
        <p>This is a basic template to edit.</p>
  </div>
  <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
@stop

@section('custom-js')
{{HTML::script('')}}
@stop
