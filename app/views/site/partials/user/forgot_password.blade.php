@section('css-top')
    {{ HTML::style('assets/css/login.css') }}
    <style>
        button {
            margin-top: 15px;
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
            <h2>Forgot Password?</h2>
            {{ Form::open(["class" => "form-signin", "url" => "user/forgot-password", "accept-charset" => "UTF-8"]) }}
            {{ Form::token() }}
            <!-- Email Form Input -->
            {{ Form::text('email', "" , ['class' => 'form-control', 'required', 'autofocus', 'placeholder' => Lang::get('user/user.e_mail'), 'tabindex' => 1 ])}}
            {{ Form::button('Request Password Reset', ["class" => "btn btn-lg btn-primary btn-block", "type" => "submit"]) }}

            {{ Form::close() }}
        </div>
    </div>
</div>

{{--@stop--}}