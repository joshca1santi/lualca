@extends('layouts.master')
@section('section')
<div class="row">
  <div class="col-lg-12">


    <div class="page-header">
      <ol class="breadcrumb">
        <li>{{{ $title or 'Default' }}}</li>
      </ol>
    </div>
      <h4><strong>Welcome</strong> to the  Admin panel.</h4>
        <blockquote>Thiss is a basic template to edit.</blockquote>

        @if(!Sentry::check())
          Not logged
        @else
          {{ Sentry::getUser()->first_name }}
        @endif



  </div>
  <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
@stop

  @section('custom-js')

  @stop
