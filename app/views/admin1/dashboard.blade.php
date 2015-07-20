<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>AdminLTE 2 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    {{ HTML::style('packages/bower_components/bootstrap/dist/css/bootstrap.min.css') }}
    <!-- Font Awesome Icons -->
    {{ HTML::style('packages/bower_components/font-awesome/css/font-awesome.min.css') }}
    <!-- Ionicons -->
    {{ HTML::style('packages/bower_components/ionicons/css/ionicons.min.css') }}
    <!-- Theme style -->
    {{ HTML::style('packages/bower_components/admin-lte/dist/css/AdminLTE.min.css') }}
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
                                                          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
-->
    {{--<link href="dist/css/skins/skin-blue.min.css" rel="stylesheet" type="text/css" />--}}
    {{ HTML::style('packages/bower_components/admin-lte/dist/css/skins/skin-blue.min.css') }}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        {{ HTML::script('packages/bower_components/html5shiv/div/html5shiv.min.js') }}
        {{ HTML::script('packages/respond/dest/respond.min.js') }}
    <![endif]-->
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

    @include('admin1/layout/header')
    @include('admin1/layout/left-column')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Page Header
            <small>Optional description</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
            <li class="active">Here</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Your Page Content Here -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

    @include('admin1/layout/footer')
    @include('admin1/layout/control-sidebar')

    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.1.4 -->
    {{ HTML::script('packages/bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js') }}
    <!-- Bootstrap 3.3.2 JS -->
    {{ HTML::script('packages/bower_components/admin-lte/bootstrap/js/bootstrap.min.js') }}
    <!-- AdminLTE App -->
    {{ HTML::script('packages/bower_components/admin-lte/dist/js/app.min.js') }}

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
          Both of these plugins are recommended to enhance the
          user experience. Slimscroll is required when using the
          fixed layout. -->
  </body>
</html>
