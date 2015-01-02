<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
    <title>
      Lualca - {{{ $title or 'Default' }}}
    </title>
  {{HTML::style('css/slate-bootstrap.min.css')}}
  <!-- MetisMenu CSS -->
  {{ HTML::style('css/plugins/metisMenu/metisMenu.min.css') }}
  <!-- Custom CSS -->
  {{ HTML::style('css/sb-admin-2.css') }}
  <!-- Custom Fonts -->
  {{ HTML::style('font-awesome/css/font-awesome.min.css') }}
  <!-- Pnotify -->
  {{ HTML::style('css/pnotify.custom.min.css') }}
  {{ HTML::style('css/plugins/social-buttons.css') }}
@yield('custom-css')
  </head>

  <body>
