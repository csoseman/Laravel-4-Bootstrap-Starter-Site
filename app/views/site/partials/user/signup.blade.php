@section('css-top')
    {{ HTML::style('assets/css/login.css') }}
    <style>
        button {
            margin-top: 15px;
        }

        input {
            margin-bottom: -1px !important;
            border-radius: 0px !important;
        }

        .first-input {
            border-top-left-radius: 10px !important;
            border-top-right-radius: 10px !important;
        }

        .last-input {
            border-bottom-left-radius: 10px !important;
            border-bottom-right-radius: 10px !important;
        }
    </style>
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
        @if (Session::get('error'))
            <div class="alert alert-error alert-danger">{{{ Session::get('error') }}}</div>
        @endif

        @if (Session::get('notice'))
            <div class="alert">{{{ Session::get('notice') }}}</div>
        @endif
        <div class="account-wall">
            {{--{{ HTML::image('images/claas-iris-horus.png') }}--}}
            <h2>Register an Account</h2>
            {{ Form::open(["class" => "form-signin", "url" => "user", "accept-charset" => "UTF-8"]) }}
            {{ Form::token() }}
            <!-- Email Form Input -->
            {{ Form::text('username', "" , ['class' => 'form-control first-input', 'required', 'autofocus', 'placeholder' => Lang::get('user/user.username'), 'tabindex' => 1 ])}}
            {{ Form::text('email', "" , ['class' => 'form-control', 'required', 'placeholder' => Lang::get('user/user.e_mail'), 'tabindex' => 2 ])}}
            {{ Form::password('password', ['class' => 'form-control', 'required', 'placeholder' => Lang::get('user/user.password'), 'tabindex' => 3 ])}}
            {{ Form::password('password_confirmation', ['class' => 'form-control last-input', 'required', 'placeholder' => Lang::get('user/user.password_confirmation'), 'tabindex' => 4 ])}}
            {{ Form::button('Request Account', ["class" => "btn btn-lg btn-primary btn-block", "type" => "submit"]) }}

            {{ Form::close() }}
        </div>
    </div>
</div>

{{--@stop--}}