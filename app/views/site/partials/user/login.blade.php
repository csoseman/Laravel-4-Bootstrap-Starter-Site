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
                    <div class="callout callout-danger alert-dismissable">
                        <h4><i class="icon fa fa-ban"></i> Error!</h4>
                        {{ $errors->first('login', ":message") }}
                    </div>
                @endif
                    @if ( Session::get('error') )
                        <div class="callout callout-danger alert-dismissable">
                            <h4><i class="icon fa fa-ban"></i> Error!</h4>
                            {{-- Foreach loop has to be implement for user registration errors --}}
                            @if(count(Session::get('error')))
                                <ul>
                                    @if(is_array(Session::get('error')))
                                        @foreach(Session::get('error') as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    @else
                                        <li>{{ Session::get('error') }}</li>
                                    @endif
                                </ul>
                            @else
                                {{ Session::get('error') }}
                            @endif
                        </div>
                    @endif
                {{--@if ( Session::get('error') )--}}
                    {{--<div class="callout callout-danger alert-dismissable">--}}
                        {{--<h4><i class="icon fa fa-ban"></i> Error!</h4>--}}
                        {{-- Foreach loop has to be implement for user registration errors --}}
                        {{--@if(count(Session::get('error')))--}}
                            {{--<ul>--}}
                                {{--@foreach(Session::get('error') as $error)--}}
                                    {{--<li>{{ $error }}</li>--}}
                                {{--@endforeach--}}
                            {{--</ul>--}}
                        {{--@else--}}
                            {{--{{ Session::get('error') }}--}}
                        {{--@endif--}}
                    {{--</div>--}}
                {{--@endif--}}

                @if ( Session::get('notice') )
                    <div class="callout callout-warning alert-dismissable">
                        <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                        {{ Session::get('notice') }}
                    </div>
                @endif

                @if ( isset($success) )
                    <div class="callout callout-success alert-dismissable">
                        <h4><i class="icon fa fa-success"></i> Success!</h4>
                        {{ $success }}
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
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_2-2">
                        {{ Form::open(["class" => "form-horizontal", "url" => "user/create", "accept-charset" => "UTF-8"]) }}
                        {{ Form::token() }}
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            {{ Form::text('first_name', "" , ['class' => 'form-control', 'required', 'placeholder' => Lang::get('user/user.first_name') ])}}
                        </div>

                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            {{ Form::text('last_name', "" , ['class' => 'form-control', 'required', 'placeholder' => Lang::get('user/user.last_name') ])}}
                        </div>

                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                            {{ Form::text('email', "" , ['class' => 'form-control', 'required', 'placeholder' => Lang::get('user/user.e_mail') ])}}
                        </div>

                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            {{ Form::text('username', "" , ['class' => 'form-control', 'required', 'placeholder' => Lang::get('user/user.username') ])}}
                        </div>

                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            {{ Form::password('password', ['class' => 'form-control', 'required', 'placeholder' => Lang::get('user/user.password') ])}}
                        </div>

                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            {{ Form::password('password_confirmation', ['class' => 'form-control last-input', 'required', 'placeholder' => Lang::get('user/user.password_confirmation') ])}}
                        </div>

                        <div class="input-group">
                            <label>Please enter your justification for access:</label>
                            {{ Form::textarea('justification', "", ['class' => 'form-control col-md-12', 'placeholder' => 'This should include what type of data or actions you need access to and why.', 'rows' => 3]) }}
                        </div>

                        <div style="margin-top:10px" class="form-group">
                            <div class="col-md-12 controls">
                                {{ Form::button('Submit Registration Request', ["class" => "btn btn-success", "type" => "submit"]) }}
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_3-2">
                        {{ Form::open(["class" => "form-horizontal", "url" => "user/forgot-password", "accept-charset" => "UTF-8"]) }}
                        {{ Form::token() }}
                        <!-- Email Form Input -->
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                            {{ Form::text('email', "" , ['class' => 'form-control', 'required', 'placeholder' => Lang::get('user/user.e_mail')])}}
                        </div>

                        <div style="margin-top:10px" class="form-group">
                            <div class="col-sm-12 controls">
                                {{ Form::button('Request Password Reset', ["class" => "btn btn-success", "type" => "submit"]) }}
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>
</div>
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