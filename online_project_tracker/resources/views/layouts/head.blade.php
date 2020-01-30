    <!-- There is no need of this head file-->
<!DOCTYPE html>
<html lang="en">
  <head>
    
    @yield('title')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('template/css/main.css')}}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="{{asset('logintemplate/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
  </head>
  <body class="app sidebar-mini rtl">
    <!-- Navbar header-->
    @yield('header')
    <!-- Sidebar menu-->
    @yield('sidebar')
	  <!-- main content-->
    
    <!-- Essential javascripts for application to work-->
    <script src="{{asset('/template/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('/template/js/popper.min.js')}}"></script>
    <script src="{{asset('/template/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/template/js/main.js')}}"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{asset('/template/js/plugins/pace.min.js')}}"></script>
    <!-- Page specific javascripts-->
    @yield('extra')
    <!-- Google analytics script-->
  </body>
</html>