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
                {{ Form::text('email', "" , ['class' => 'form-control', 'required', 'autofocus', 'placeholder' => Lang::get('user/user.e_mail'), 'tabindex' => 1 ])}}
                {{ Form::password('password', ['class' => 'form-control', 'required', 'placeholder' => Lang::get('user/user.password'), 'tabindex' => 2])}}
                {{ Form::submit('Sign In', ["class" => "btn btn-lg btn-primary btn-block"]) }}
                <div class="remember-me-div">
                    <label class="checkbox">
                        {{ Form::checkbox('remember', '1') }}
                        <span class="remember-me-label">{{ Lang::get('confide::confide.login.remember') }}</span>
                    </label>
                </div>

                {{ HTML::link('forgot', Lang::get('user/user.forgot_password'), ['class' => 'text-center new-account']) }}
                <hr>
                <br>
                <p><a href="#" class="need-help">Email System Administrator</a><span class="clearfix"></span></p>
                {{ Form::close() }}
            </div>
        </div>
    </div>