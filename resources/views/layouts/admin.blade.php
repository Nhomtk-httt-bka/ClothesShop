<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="BinhMinhs10">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  

  <title>Creative - Bootstrap Admin Template</title>

  <!-- Bootstrap CSS -->
  <link href="{{ asset('css/nice-admin-bootstrap/bootstrap.min.css') }}" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="{{ asset('css/nice-admin-bootstrap/bootstrap-theme.css') }}" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="{{ asset('css/nice-admin-bootstrap/elegant-icons-style.css') }}" rel="stylesheet" />
  <link href="{{ asset('css/nice-admin-bootstrap/font-awesome.min.css') }}" rel="stylesheet" />
  <!-- full calendar css-->
  <link href="{{ asset('assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/fullcalendar/fullcalendar/fullcalendar.css') }}" rel="stylesheet" />
  <!-- easy pie chart-->
  <link href="{{ asset('assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css') }}" rel="stylesheet" type="text/css" media="screen" />
  <!-- owl carousel -->
  <link rel="stylesheet" href="{{ asset('css/nice-admin-bootstrap/owl.carousel.css') }}" type="text/css">
  <link href="{{ asset('css/nice-admin-bootstrap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet">
  <!-- Custom styles -->
  <link rel="stylesheet" href="{{ asset('css/nice-admin-bootstrap/fullcalendar.css') }}">
  <link href="{{ asset('css/nice-admin-bootstrap/widgets.css') }}" rel="stylesheet">
  <link href="{{ asset('css/nice-admin-bootstrap/style.css') }}" rel="stylesheet">
  <link href="{{ asset('css/nice-admin-bootstrap/style-responsive.css') }}" rel="stylesheet" />
  <link href="{{ asset('css/nice-admin-bootstrap/xcharts.min.css') }}" rel=" stylesheet">
  <link href="{{ asset('css/nice-admin-bootstrap/jquery-ui-1.10.4.min.css') }}" rel="stylesheet">
  <!-- =======================================================
    Theme Name: NiceAdmin
    Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body>
  <!-- container section start -->
  <section id="container">
    
    <!-- header -->
    @include('component.navbar')
    <!--header end-->


    @include('component.sidebar')

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        @yield('content')
      </section>
      
    </section>
    <!--main content end-->
  </section>
  <!-- container section start -->

  <!-- javascripts -->
  <script src="{{ asset ('js/nice-admin-bootstrap/jquery.js') }}"></script>
  <script src="{{ asset ('js/nice-admin-bootstrap/jquery-ui-1.10.4.min.js') }}"></script>
  <script src="{{ asset ('js/nice-admin-bootstrap/jquery-1.8.3.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset ('js/nice-admin-bootstrap/jquery-ui-1.9.2.custom.min.js') }}"></script>
  <!-- bootstrap -->
  <script src="{{ asset ('js/nice-admin-bootstrap/bootstrap.min.js') }}"></script>
  <!-- nice scroll -->
  <script src="{{ asset ('js/nice-admin-bootstrap/jquery.scrollTo.min.js') }}"></script>
  <script src="{{ asset ('js/nice-admin-bootstrap/jquery.nicescroll.js') }}" type="text/javascript"></script>
  <!-- charts scripts -->
  <script src="{{ asset ('assets/jquery-knob/js/jquery.knob.js') }}"></script>
  <script src="{{ asset ('js/nice-admin-bootstrap/jquery.sparkline.js') }}" type="text/javascript"></script>
  <script src="{{ asset ('assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js') }}"></script>
  <script src="{{ asset ('js/nice-admin-bootstrap/owl.carousel.js') }}"></script>
  <!-- jQuery full calendar -->
  <<script src="{{ asset ('js/nice-admin-bootstrap/fullcalendar.min.js') }}"></script>
    <!-- Full Google Calendar - Calendar -->
    <script src="{{ asset ('assets/fullcalendar/fullcalendar/fullcalendar.js') }}"></script>
    <!--script for this page only-->
    <script src="{{ asset ('js/nice-admin-bootstrap/calendar-custom.js') }}"></script>
    <script src="{{ asset ('js/nice-admin-bootstrap/jquery.rateit.min.js') }}"></script>
    <!-- custom select -->
    <script src="{{ asset ('js/nice-admin-bootstrap/jquery.customSelect.min.js') }}"></script>
    <script src="{{ asset ('assets/chart-master/Chart.js') }}"></script>

    <!--custome script for all page-->
    <script src="{{ asset ('js/nice-admin-bootstrap/scripts.js') }}"></script>
    <!-- custom script for this page-->
    <script src="{{ asset ('js/nice-admin-bootstrap/sparkline-chart.js') }}"></script>
    <script src="{{ asset ('js/nice-admin-bootstrap/easy-pie-chart.js') }}"></script>
    <script src="{{ asset ('js/nice-admin-bootstrap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset ('js/nice-admin-bootstrap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset ('js/nice-admin-bootstrap/xcharts.min.js') }}"></script>
    <script src="{{ asset ('js/nice-admin-bootstrap/jquery.autosize.min.js') }}"></script>
    <script src="{{ asset ('js/nice-admin-bootstrap/jquery.placeholder.min.js') }}"></script>
    <script src="{{ asset ('js/nice-admin-bootstrap/gdp-data.js') }}"></script>
    <script src="{{ asset ('js/nice-admin-bootstrap/morris.min.js') }}"></script>
    <script src="{{ asset ('js/nice-admin-bootstrap/sparklines.js') }}"></script>
    <script src="{{ asset ('js/nice-admin-bootstrap/charts.js') }}"></script>
    <script src="{{ asset ('js/nice-admin-bootstrap/jquery.slimscroll.min.js') }}"></script>
    
</body>

</html>
