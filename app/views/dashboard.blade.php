@extends('layouts.master')
@section('section')
<div class="row">
  <div class="col-lg-12">
    @if($currentUser->hasAccess('admin'))

    <div class="page-header">
      <ol class="breadcrumb">
        <li>{{{ $title or 'Default' }}}</li>
      </ol>
    </div>
      <h4><strong>Welcome</strong> to the Lualca Admin panel.</h4>
        <blockquote>This is a basic template to edit.</blockquote>

        @if(!Sentry::check())
          Not logged
        @else
          {{ Sentry::getUser()->email }}
        @endif

     @endif


  </div>
  <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
@stop

  @section('custom-js')

  @stop
