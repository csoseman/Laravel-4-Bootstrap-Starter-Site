@extends('site.layouts.default')
@section('title')
    {{{ Lang::get('user/user.login') }}} ::
    @parent
@stop
@section('css-top')
    <!-- Bootstrap 3.3.4 -->
    {{ HTML::style('packages/bower_components/bootstrap/dist/css/bootstrap.min.css') }}
    <!-- Font Awesome Icons -->
    {{ HTML::style('packages/bower_components/font-awesome/css/font-awesome.min.css') }}
    <!-- Ionicons -->
    {{ HTML::style('packages/bower_components/ionicons/css/ionicons.min.css') }}
    <!-- AdminLTE Theme style -->
    {{ HTML::style('packages/bower_components/admin-lte/dist/css/AdminLTE.min.css') }}
    <style>
        body {
            background-color: #ecf0f5;
        }

        .navbar {
            display: none !important;
        }

        .alert {
            display: none !important;
        }
    </style>
    {{ HTML::style('assets/css/login.css') }}
@stop
@section('content')
<div class="row vertical-center-row">
    <div class="col-sm-6 col-md-12 text-center">
        <div class="col-md-8 col-md-offset-2">
            <div class="row">
                @if($errors->has('login'))
                    <div class="callout callout-danger alert-dismissable">
                        <h4><i class="icon fa fa-ban"></i> Error!</h4>
                        {{ $errors->first('login', ":message") }}
                    </div>
                @endif
                @if ( Session::get('error') )
                    <div class="callout callout-danger alert-dismissable">
                        <h4><i class="icon fa fa-ban"></i> Error!</h4>
                        {{ Session::get('error') }}
                    </div>
                @endif

                @if ( Session::get('notice') )
                    <div class="callout callout-warning alert-dismissable">
                        <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                        {{ Session::get('notice') }}
                    </div>
                @endif
            </div>
            <!-- Custom Tabs (Pulled to the right) -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs pull-right">
                    <li class="active"><a href="#tab_1-1" data-toggle="tab">Change Password</a></li>
                    <li class="pull-left header"><i class="fa fa-th"></i> {{ Lang::get('site.app_name_full') }}</li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1-1">
                        {{ Form::open(["class" => "form-horizontal", "url" => "user/reset", "accept-charset" => "UTF-8"]) }}
                        {{ Form::hidden('token', $token) }}

                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            {{ Form::password('password', ['class' => 'form-control', 'required', 'autofocus', 'placeholder' => Lang::get('user/user.password'), 'tabindex' => 1])}}
                        </div>

                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            {{ Form::password('password_confirmation', ['class' => 'form-control', 'required', 'placeholder' => Lang::get('user/user.password_confirmation'), 'tabindex' => 2])}}
                        </div>

                        <div style="margin-top:10px" class="form-group">
                            <div class="col-sm-12 controls">
                                {{ Form::submit('Change Password', ["class" => "btn btn-success"]) }}
                            </div>
                        </div>


                        </form>
                    </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
            </div><!-- nav-tabs-custom -->
        </div><!-- /.col -->
    </div>
</div>
@stop
@section('js-bottom')
    {{ HTML::script('packages/bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js') }}
    <!--jQuery UI-->
    {{ HTML::script('packages/bower_components/admin-lte/plugins/jQueryUI/jquery-ui.min.js') }}
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 JS -->
    {{ HTML::script('packages/bower_components/bootstrap/dist/js/bootstrap.min.js') }}
    {{ HTML::script('packages/bower_components/admin-lte/dist/js/app.min.js') }}
@stop