<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>AdminLTE 2 | Dashboard</title>
    <meta name="keywords" content="@yield('keywords')" />
    <meta name="author" content="@yield('author')" />

    <!-- Google will often use this as its description of your page/site. Make it good. -->
    <meta name="description" content="@yield('description')" />

    <!-- Speaking of Google, don't forget to set your site up: http://google.com/webmasters -->
    <meta name="google-site-verification" content="">

    <!-- Dublin Core Metadata : http://dublincore.org/ -->
    <meta name="DC.title" content="{{ Config::get('site.name') }}">
    <meta name="DC.subject" content="@yield('description')">
    <meta name="DC.creator" content="@yield('author')">

    <!-- Tell the browser to be responsive to screen width -->
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <!-- Bootstrap 3.3.4 -->
    {{ HTML::style('packages/bower_components/bootstrap/dist/css/bootstrap.min.css') }}
    <!-- Font Awesome Icons -->
    {{ HTML::style('packages/bower_components/font-awesome/css/font-awesome.min.css') }}
    <!-- Ionicons -->
    {{ HTML::style('packages/bower_components/ionicons/css/ionicons.min.css') }}
    <!-- AdminLTE Theme style -->
    {{ HTML::style('packages/bower_components/admin-lte/dist/css/AdminLTE.min.css') }}
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter page. However, you can choose any
    other skin. Make sure you apply the skin class to the body tag so the changes take effect. -->
    {{ HTML::style('packages/bower_components/admin-lte/dist/css/skins/skin-blue.min.css') }}
    <!-- iCheck -->
    {{ HTML::style('packages/bower_components/admin-lte/plugins/iCheck/all.css') }}
    <!-- Morris chart -->
    {{ HTML::style('packages/bower_components/admin-lte/plugins/morris/morris.css') }}
    <!-- jvectormap -->
    {{ HTML::style('packages/bower_components/admin-lte/plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}
    <!-- Datepicker -->
    {{ HTML::style('packages/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.css') }}
    <!-- Daterange Picker -->
    {{ HTML::style('packages/bower_components/admin-lte/plugins/daterangepicker/daterangepicker-bs3.css') }}
    <!-- bootstrap wysihtml5 - text editor -->
    {{ HTML::style('packages/bower_components/admin-lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.css') }}
    <!-- ColorBox -->
    {{ HTML::style('packages/bower_components/colorbox/example1/colorbox.css') }}
    <!-- Select2 -->
    {{ HTML::style('packages/bower_components/select2/select2.css') }}
    {{ HTML::style('packages/bower_components/select2/select2-bootstrap.css') }}
    <!-- Datatables style -->
    {{ HTML::style('packages/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}

    <style>
        .breadcrumb {margin-bottom: 0}
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        {{ HTML::script('packages/bower_components/html5shiv/div/html5shiv.min.js') }}
        {{ HTML::script('packages/respond/dest/respond.min.js') }}
    <![endif]-->
      <style type="text/css">
          .jqstooltip {
              position: absolute;
              left: 0px;
              top: 0px;
              visibility: hidden;
              background: rgb(0, 0, 0) transparent;
              background-color: rgba(0,0,0,0.6);
              filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);
              -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";
              color: white;
              font: 10px arial, san serif;
              text-align: left;
              white-space: nowrap;
              padding: 5px;
              border: 1px solid white;
              z-index: 10000;
          }

          .jqsfield {
              color: white;
              font: 10px arial, san serif;
              text-align: left;
          }
      </style>
  </head>
  <!--
  BODY TAG OPTIONS:
  =================
  Apply one or more of the following classes to get the
  desired effect
  |---------------------------------------------------------|
  | SKINS         | skin-blue                               |
  |               | skin-black                              |
  |               | skin-purple                             |
  |               | skin-yellow                             |
  |               | skin-red                                |
  |               | skin-green                              |
  |---------------------------------------------------------|
  |LAYOUT OPTIONS | fixed                                   |
  |               | layout-boxed                            |
  |               | layout-top-nav                          |
  |               | sidebar-collapse                        |
  |               | sidebar-mini                            |
  |---------------------------------------------------------|
  -->
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">

    @include('admin.layouts.header')
    @include('admin.layouts.left-column')
    @include('admin.layouts.content')
    @include('admin.layouts.footer')
    @include('admin.layouts.control-sidebar')

</div><!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.4 -->
{{ HTML::script('packages/bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js') }}
<!--jQuery UI-->
{{ HTML::script('packages/bower_components/admin-lte/plugins/jQueryUI/jquery-ui.min.js') }}
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.5 JS -->
{{ HTML::script('packages/bower_components/bootstrap/dist/js/bootstrap.min.js') }}
<!-- DataTables -->
{{ HTML::script('packages/bower_components/datatables/media/js/jquery.dataTables.js') }}
{{ HTML::script('packages/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.js') }}
{{ HTML::script('packages/bower_components/datatables-plugins/api/fnReloadAjax.js') }}
<!-- Morris.js charts -->
{{ HTML::script('packages/bower_components/raphael/raphael-min.js') }}
{{ HTML::script('packages/bower_components/admin-lte/plugins/morris/morris.min.js') }}
<!-- Sparkline -->
{{ HTML::script('packages/bower_components/admin-lte/plugins/sparkline/jquery.sparkline.min.js') }}
<!-- jvectormap -->
{{ HTML::script('packages/bower_components/admin-lte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}
{{ HTML::script('packages/bower_components/admin-lte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}
<!-- jQuery Knob -->
{{ HTML::script('packages/bower_components/jquery-knob/js/jquery.knob.js') }}
<!-- daterangepicker -->
{{ HTML::script('packages/bower_components/moment/min/moment.min.js') }}
{{ HTML::script('packages/bower_components/admin-lte/plugins/daterangepicker/daterangepicker.js') }}
<!-- Bootstrap WYSIHTML5 -->
{{ HTML::script('packages/bower_components/admin-lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js') }}
<!-- SlimScroll -->
{{ HTML::script('packages/bower_components/admin-lte/plugins/slimScroll/jquery.slimscroll.js') }}
<!-- FastClick -->
{{ HTML::script('/packages/bower_components/admin-lte/plugins/fastclick/fastclick.js') }}
<!-- AdminLTE App -->
{{ HTML::script('packages/bower_components/admin-lte/dist/js/app.min.js') }}
<!-- iCheck -->
{{ HTML::script('packages/bower_components/admin-lte/plugins/iCheck/icheck.js') }}
<!-- jQuery Input Mask -->
{{ HTML::script('packages/bower_components/admin-lte/plugins/input-mask/jquery.inputmask.js') }}
{{ HTML::script('packages/bower_components/admin-lte/plugins/input-mask/jquery.inputmask.date.extensions.js') }}
{{ HTML::script('packages/bower_components/admin-lte/plugins/input-mask/jquery.inputmask.extensions.js') }}
<!-- Select2 -->
{{ HTML::script('packages/bower_components/select2/select2.js') }}
<!-- ColorBox -->
{{ HTML::script('packages/bower_components/colorbox/jquery.colorbox.js') }}
{{ HTML::script('packages/bower_components/code-prettify/src/prettify.js') }}
<!-- Datepicker -->
{{ HTML::script('packages/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}

{{-- For DEMO USE ONLY --}}

    <!-- fullCalendar -->
    {{ HTML::script('packages/bower_components/admin-lte/plugins/fullcalendar/fullcalendar.min.js') }}
    {{-- ^^ For DEMO USE ONLY ^^ --}}


    <div class="daterangepicker dropdown-menu opensleft"><div class="calendar first left"><div class="calendar-date"><table class="table-condensed"><thead><tr><th class="prev available"><i class="fa fa-arrow-left icon icon-arrow-left glyphicon glyphicon-arrow-left"></i></th><th colspan="5" class="month">Aug 2015</th><th class="next available"><i class="fa fa-arrow-right icon icon-arrow-right glyphicon glyphicon-arrow-right"></i></th></tr><tr><th>Su</th><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th></tr></thead><tbody><tr><td class="available off" data-title="r0c0">26</td><td class="available off" data-title="r0c1">27</td><td class="available off" data-title="r0c2">28</td><td class="available off" data-title="r0c3">29</td><td class="available off" data-title="r0c4">30</td><td class="available off" data-title="r0c5">31</td><td class="available" data-title="r0c6">1</td></tr><tr><td class="available" data-title="r1c0">2</td><td class="available" data-title="r1c1">3</td><td class="available" data-title="r1c2">4</td><td class="available" data-title="r1c3">5</td><td class="available" data-title="r1c4">6</td><td class="available" data-title="r1c5">7</td><td class="available" data-title="r1c6">8</td></tr><tr><td class="available" data-title="r2c0">9</td><td class="available" data-title="r2c1">10</td><td class="available" data-title="r2c2">11</td><td class="available" data-title="r2c3">12</td><td class="available" data-title="r2c4">13</td><td class="available" data-title="r2c5">14</td><td class="available" data-title="r2c6">15</td></tr><tr><td class="available" data-title="r3c0">16</td><td class="available" data-title="r3c1">17</td><td class="available" data-title="r3c2">18</td><td class="available" data-title="r3c3">19</td><td class="available" data-title="r3c4">20</td><td class="available" data-title="r3c5">21</td><td class="available" data-title="r3c6">22</td></tr><tr><td class="available active start-date" data-title="r4c0">23</td><td class="available in-range" data-title="r4c1">24</td><td class="available in-range" data-title="r4c2">25</td><td class="available in-range" data-title="r4c3">26</td><td class="available in-range" data-title="r4c4">27</td><td class="available in-range" data-title="r4c5">28</td><td class="available in-range" data-title="r4c6">29</td></tr><tr><td class="available in-range" data-title="r5c0">30</td><td class="available in-range" data-title="r5c1">31</td><td class="available off in-range" data-title="r5c2">1</td><td class="available off in-range" data-title="r5c3">2</td><td class="available off in-range" data-title="r5c4">3</td><td class="available off in-range" data-title="r5c5">4</td><td class="available off in-range" data-title="r5c6">5</td></tr></tbody></table></div></div><div class="calendar second right"><div class="calendar-date"><table class="table-condensed"><thead><tr><th class="prev available"><i class="fa fa-arrow-left icon icon-arrow-left glyphicon glyphicon-arrow-left"></i></th><th colspan="5" class="month">Sep 2015</th><th class="next available"><i class="fa fa-arrow-right icon icon-arrow-right glyphicon glyphicon-arrow-right"></i></th></tr><tr><th>Su</th><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th></tr></thead><tbody><tr><td class="available off in-range" data-title="r0c0">30</td><td class="available off in-range" data-title="r0c1">31</td><td class="available in-range" data-title="r0c2">1</td><td class="available in-range" data-title="r0c3">2</td><td class="available in-range" data-title="r0c4">3</td><td class="available in-range" data-title="r0c5">4</td><td class="available in-range" data-title="r0c6">5</td></tr><tr><td class="available in-range" data-title="r1c0">6</td><td class="available in-range" data-title="r1c1">7</td><td class="available in-range" data-title="r1c2">8</td><td class="available in-range" data-title="r1c3">9</td><td class="available in-range" data-title="r1c4">10</td><td class="available in-range" data-title="r1c5">11</td><td class="available in-range" data-title="r1c6">12</td></tr><tr><td class="available in-range" data-title="r2c0">13</td><td class="available in-range" data-title="r2c1">14</td><td class="available in-range" data-title="r2c2">15</td><td class="available in-range" data-title="r2c3">16</td><td class="available in-range" data-title="r2c4">17</td><td class="available in-range" data-title="r2c5">18</td><td class="available in-range" data-title="r2c6">19</td></tr><tr><td class="available in-range" data-title="r3c0">20</td><td class="available active end-date" data-title="r3c1">21</td><td class="available" data-title="r3c2">22</td><td class="available" data-title="r3c3">23</td><td class="available" data-title="r3c4">24</td><td class="available" data-title="r3c5">25</td><td class="available" data-title="r3c6">26</td></tr><tr><td class="available" data-title="r4c0">27</td><td class="available" data-title="r4c1">28</td><td class="available" data-title="r4c2">29</td><td class="available" data-title="r4c3">30</td><td class="available off" data-title="r4c4">1</td><td class="available off" data-title="r4c5">2</td><td class="available off" data-title="r4c6">3</td></tr><tr><td class="available off" data-title="r5c0">4</td><td class="available off" data-title="r5c1">5</td><td class="available off" data-title="r5c2">6</td><td class="available off" data-title="r5c3">7</td><td class="available off" data-title="r5c4">8</td><td class="available off" data-title="r5c5">9</td><td class="available off" data-title="r5c6">10</td></tr></tbody></table></div></div><div class="ranges"><ul><li>Today</li><li>Yesterday</li><li>Last 7 Days</li><li class="active">Last 30 Days</li><li>This Month</li><li>Last Month</li><li>Custom Range</li></ul><div class="range_inputs"><div class="daterangepicker_start_input"><label for="daterangepicker_start">From</label><input class="input-mini" name="daterangepicker_start" value="" type="text"></div><div class="daterangepicker_end_input"><label for="daterangepicker_end">To</label><input class="input-mini" name="daterangepicker_end" value="" type="text"></div><button class="applyBtn btn btn-small btn-sm btn-success">Apply</button>&nbsp;<button class="cancelBtn btn btn-small btn-sm btn-default">Cancel</button></div></div></div>
    <div class="jvectormap-label"></div>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->
    <script type="text/javascript">
        $('.wysihtml5').wysihtml5();
        $(prettyPrint);
        $(document).ready(function() {
            // select2 style
            $('.select2').select2();
            // dataTables bootstrap style
            $('.dataTables_length select').select2({width: 80})
            $('.dataTables_filter input').addClass('form-control')
            // inputmask
            $(".inputmask").inputmask();
            //Date range picker
            $('.daterange').daterangepicker();
            // Date picker
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd'
            });
            // add blue bg on header
            $('.dataTable th').addClass('bg-blue');
        });
    </script>
    @yield('scripts')
</body>
</html>
