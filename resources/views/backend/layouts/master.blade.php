<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title> @yield('title','Laravel Admin Role') </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    @include('backend.layouts.partials.styles')
    @yield('styles')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-blue">
    <div class="wrapper">
      {{-- header --}}
      @include('backend.layouts.partials.main-header')
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        @include('backend.layouts.partials.sidebar')
      </aside>
      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- Main content -->
        @yield('admin-content')
      </div><!-- /.content-wrapper -->
      {{-- Footer --}}
      @include('backend.layouts.partials.footer')
    </div><!-- ./wrapper -->
    @include('backend.layouts.partials.scripts')
    @yield('scripts')
  </body>
</html>