@include('layouts.header')
    <div id="wrapper">
      @include('layouts.menu')
    <!-- Page Content -->
    <div id="page-wrapper">
      <div class="container-fluid">
        @yield('section','Default')
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
    </div>
@include('layouts.footer')
