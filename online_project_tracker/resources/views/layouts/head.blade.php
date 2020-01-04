<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Blank Page - Vali Admin</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="template/css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="logintemplate/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  </head>
  <body class="app sidebar-mini rtl">
    <!-- Navbar header-->
    @yield('header')
    <!-- Sidebar menu-->
    @yield('sidebar')
	  <!-- main content-->
    
    <!-- Essential javascripts for application to work-->
    <script src="/template/js/jquery-3.2.1.min.js"></script>
    <script src="/template/js/popper.min.js"></script>
    <script src="/template/js/bootstrap.min.js"></script>
    <script src="/template/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="/template/js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <!-- Google analytics script-->
    <!--<script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
      	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      	ga('create', 'UA-72504830-1', 'auto');
      	ga('send', 'pageview');
      }
    </script> -->
  </body>
</html>