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
      <h4><strong>Parameters</strong> to configurate the Admin panel.</h4>
  </div>
  <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
  <div class="col-md-8 col-md-offset-2 well">
    {{ Form::open(array('url' => 'parameters', 'id' => 'parameters')) }}
    <p>
      {{ Form::label('company', 'Company Name') }}
      {{ Form::text('company', Input::old('company'), array('placeholder' => 'Type the company name...', 'class' => 'form-control input-lg')) }}
    </p>
    <p>
      {{ Form::label('adress', 'Adress') }}
      {{ Form::text('adress', Input::old('adress'), array('placeholder' => "Adress...", 'class' => 'form-control input-lg')) }}
    </p>
    <p>{{ Form::submit('Submit!', array('class' => 'btn btn-success')) }}

    </p>
    {{ Form::close() }}
  </div>
</div>
@stop

@section('custom-js')

<script type="text/javascript">
jQuery(document).ready(function($){


});
</script>
@stop
