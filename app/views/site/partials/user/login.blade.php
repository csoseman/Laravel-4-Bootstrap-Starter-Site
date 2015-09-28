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
    </style>
    {{ HTML::style('assets/css/login.css') }}
@stop
<div class="row vertical-center-row">
    <div class="col-sm-6 col-md-12 text-center">
    <div class="col-md-8 col-md-offset-2">
        <div class="row">
            @if($errors->has('login'))
                {{--<div class="alert alert-danger" role="alert">--}}
                {{--<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>--}}
                {{--<span class="sr-only">Error:</span>--}}
                {{--{{ $errors->first('login', ":message") }}--}}
                {{--</div>--}}
                <div class="callout callout-danger alert-dismissable">
                    {{--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>--}}
                    <h4><i class="icon fa fa-ban"></i> Error!</h4>
                    {{ $errors->first('login', ":message") }}
                </div>
            @endif
            @if ( Session::get('error') )
                {{--<div class="alert alert-danger">{{ Session::get('error') }}</div>--}}
                <div class="callout callout-danger alert-dismissable">
                    {{--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>--}}
                    <h4><i class="icon fa fa-ban"></i> Error!</h4>
                    {{ Session::get('error') }}
                </div>
            @endif

            @if ( Session::get('notice') )
                {{--<div class="alert">{{ Session::get('notice') }}</div>--}}
                <div class="callout callout-warning alert-dismissable">
                    {{--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>--}}
                    <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                    {{ Session::get('notice') }}
                </div>
            @endif
        </div>
        <!-- Custom Tabs (Pulled to the right) -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs pull-right">
                <li class="active"><a href="#tab_1-1" data-toggle="tab">Login</a></li>
                <li><a href="#tab_2-2" data-toggle="tab">Register</a></li>
                <li><a href="#tab_3-2" data-toggle="tab">Reset Password</a></li>
                <li class="pull-left header"><i class="fa fa-th"></i> {{ Lang::get('site.app_name_full') }}</li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1-1">
                    {{ Form::open(["class" => "form-horizontal", "url" => "user/login", "accept-charset" => "UTF-8"]) }}
                    {{ Form::token() }}

                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            {{ Form::text('email', "" , ['class' => 'form-control', 'required', 'autofocus', 'placeholder' => Lang::get('user/user.e_mail'), 'tabindex' => 1 ])}}
                        </div>

                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            {{ Form::password('password', ['class' => 'form-control', 'required', 'placeholder' => Lang::get('user/user.password'), 'tabindex' => 2])}}
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="checkbox">
                                    <label>
                                        {{ Form::checkbox('remember', '1') }} Remember me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div style="margin-top:10px" class="form-group">
                            <div class="col-sm-12 controls">
                                {{ Form::submit('Sign In', ["class" => "btn btn-success"]) }}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 control">
                                <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%">
                                    Don't have an account?
                                    <a href="#tab_2-2">Request One Here!</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div><!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2-2">
                    <form method="POST" action="http://localhost:8003/users/login" accept-charset="UTF-8" class="form-horizontal"><input name="_token" value="wPCSxxtszCPBmphWMBHddWGlZ9Xy4uG2Q9lgcGnI" type="hidden">

                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="login-username" class="form-control" name="username" value="" placeholder="first name" type="text">
                        </div>

                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="login-username" class="form-control" name="username" value="" placeholder="last name" type="text">
                        </div>

                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                            <input id="login-username" class="form-control" name="username" value="" placeholder="email" type="text">
                        </div>

                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="login-password" class="form-control" name="password" placeholder="password" type="password">
                        </div>

                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="login-password" class="form-control" name="password" placeholder="confirm password" type="password">
                        </div>

                        <div class="input-group">
                            <label>Please enter your justification for access:</label>
                            <textarea class="form-control col-md-12" rows="3" placeholder="This should include what type of data or actions you need access to and why."></textarea>
                        </div>

                        <div style="margin-top:10px" class="form-group">
                            <div class="col-sm-12 controls">
                                <button id="btn-login" href="#" class="btn btn-success">Submit Registration Request  </button>
                                {{--<button id="btn-fblogin" href="#" class="btn btn-primary">Login with Facebook</button>--}}
                            </div>
                        </div>
                    </form>
                </div><!-- /.tab-pane -->
                <div class="tab-pane" id="tab_3-2">
                    <form method="POST" action="http://localhost:8003/users/login" accept-charset="UTF-8" class="form-horizontal"><input name="_token" value="wPCSxxtszCPBmphWMBHddWGlZ9Xy4uG2Q9lgcGnI" type="hidden">
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                            <input id="login-username" class="form-control" name="username" value="" placeholder="email" type="text">
                        </div>

                        <div style="margin-top:10px" class="form-group">
                            <div class="col-sm-12 controls">
                                <button id="btn-login" href="#" class="btn btn-success">Request Password Reset  </button>
                            </div>
                        </div>
                    </form>
                </div><!-- /.tab-pane -->
            </div><!-- /.tab-content -->
        </div><!-- nav-tabs-custom -->
    </div><!-- /.col -->
</div>
    </div>
    {{--<div class="row vertical-center-row">--}}
        {{--<div class="col-sm-6 col-md-4 col-md-offset-4 text-center">--}}
            {{--@if($errors->has('login'))--}}
                {{--<div class="alert alert-danger" role="alert">--}}
                    {{--<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>--}}
                    {{--<span class="sr-only">Error:</span>--}}
                    {{--{{ $errors->first('login', ":message") }}--}}
                {{--</div>--}}
            {{--@endif--}}
            {{--@if ( Session::get('error') )--}}
                {{--<div class="alert alert-danger">{{ Session::get('error') }}</div>--}}
            {{--@endif--}}

            {{--@if ( Session::get('notice') )--}}
                {{--<div class="alert">{{ Session::get('notice') }}</div>--}}
            {{--@endif--}}
            {{--<div class="account-wall">--}}
                {{--{{ HTML::image('assets/img/claas-easy-icon-transparent.png', null, ['width' => '280']) }}--}}
                {{--<h2>{{ Lang::get('site.app_name_full') }}</h2>--}}
                {{--{{ Form::open(["class" => "form-signin", "url" => "user/login", "accept-charset" => "UTF-8"]) }}--}}
                {{--{{ Form::token() }}--}}
                {{--{{ Form::text('email', "" , ['class' => 'form-control', 'required', 'autofocus', 'placeholder' => Lang::get('user/user.e_mail'), 'tabindex' => 1 ])}}--}}
                {{--{{ Form::password('password', ['class' => 'form-control', 'required', 'placeholder' => Lang::get('user/user.password'), 'tabindex' => 2])}}--}}
                {{--{{ Form::submit('Sign In', ["class" => "btn btn-lg btn-primary btn-block"]) }}--}}
                {{--<div class="remember-me-div">--}}
                    {{--<label class="checkbox">--}}
                        {{--{{ Form::checkbox('remember', '1') }}--}}
                        {{--<span class="remember-me-label">{{ Lang::get('confide::confide.login.remember') }}</span>--}}
                    {{--</label>--}}
                {{--</div>--}}

                {{--{{ HTML::link('forgot', Lang::get('user/user.forgot_password'), ['class' => 'text-center new-account']) }}--}}
                {{--<hr>--}}
                {{--<br>--}}
                {{--<p><a href="#" class="need-help">Email System Administrator</a><span class="clearfix"></span></p>--}}
                {{--{{ Form::close() }}--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
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