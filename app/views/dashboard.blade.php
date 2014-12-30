@extends('layouts.master')
@section('section')
<div class="row">
  <div class="col-lg-12">
    <h2 class="page-header">{{{ $title or 'Default' }}}</h2>
      <h4><strong>Welcome</strong> to the Lualca Admin panel.</h4>
        <blockquote>This is a basic template to edit.</blockquote>

        @if(!Sentry::check())
          Not logged
        @else
          {{ Sentry::getUser()->email }}
        @endif


  </div>
  <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
@stop

  @section('custom-js')

  @stop
