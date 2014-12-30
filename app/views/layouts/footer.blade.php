<!-- jQuery -->
{{HTML::script('js/jquery.js')}}
<!--
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<!-- Bootstrap Core JavaScript -->
{{HTML::script('js/bootstrap.min.js')}}
<!-- Metis Menu Plugin JavaScript -->
{{HTML::script('js/plugins/metisMenu/metisMenu.min.js')}}
<!-- Custom Theme JavaScript -->
{{HTML::script('js/sb-admin-2.js')}}
{{HTML::script('js/pnotify.custom.min.js')}}
<script type="text/javascript">
$( document ).ready(function() {

  var url = window.location;

  $('ul.nav a[href="'+ url +'"]').addClass('active').parent().parent().addClass('in').parent().addClass('active');

  // Will also work for relative and absolute hrefs

  $('ul.nav a').filter(function() {

    return this.href == url;

  }).addClass('active').parent().parent().addClass('in').parent().addClass('active');

});
</script>

@yield('custom-js')
  </body>
</html>
