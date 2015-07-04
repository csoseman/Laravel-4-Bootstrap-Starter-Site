@section('css-top')
    {{ HTML::style('assets/css/login.css') }}
@stop

    <div class="row vertical-center-row">
        <div class="col-sm-6 col-md-4 col-md-offset-4 text-center">
            @if($errors->has('login'))
                <div class="alert alert-danger" role="alert">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span class="sr-only">Error:</span>
                    {{ $errors->first('login', ":message") }}
                </div>
            @endif
            @if ( Session::get('error') )
                <div class="alert alert-danger">{{ Session::get('error') }}</div>
            @endif

            @if ( Session::get('notice') )
                <div class="alert">{{ Session::get('notice') }}</div>
            @endif
            <div class="account-wall">
                {{ HTML::image('images/claas-iris-horus.png') }}
                {{ Form::open(["class" => "form-signin", "url" => "user/login", "accept-charset" => "UTF-8"]) }}
                {{ Form::token() }}
                <!-- Email Form Input -->
                {{ Form::text('email', "" , ['class' => 'form-control', 'required', 'autofocus', 'placeholder' => Lang::get('user/user.e_mail'), 'tabindex' => 1 ])}}
{{--                {{ $errors->first('email', '<span class=error>:message</span>') }}--}}
                {{--<input type="text" class="form-control" placeholder="Email" required autofocus>--}}

                <!-- Password Form Input -->
                {{ Form::password('password', ['class' => 'form-control', 'required', 'placeholder' => Lang::get('user/user.password'), 'tabindex' => 2])}}
                {{--{{ $errors->first('password', '<span class=error>:message</span>') }}--}}
                {{--<input type="password" class="form-control" placeholder="Password" required>--}}

                <!-- Sign In Button -->
                <button class="btn btn-lg btn-primary btn-block" type="submit">
                    Sign In
                </button>
                <div class="remember-me-div">
                    <label class="checkbox">
                        {{ Form::checkbox('remember', '1') }}
                        <span class="remember-me-label">{{ Lang::get('confide::confide.login.remember') }}</span>
                    </label>
                </div>

                {{--<p><a href="#" class="text-center new-account">Request Password Reset</a></p>--}}
                {{ HTML::link('forgot', Lang::get('user/user.forgot_password'), ['class' => 'text-center new-account']) }}
                <hr>
                <br>
                <p><a href="#" class="need-help">Email System Administrator</a><span class="clearfix"></span></p>
                {{ Form::close() }}
            </div>
        </div>
    </div>

{{--@stop--}}