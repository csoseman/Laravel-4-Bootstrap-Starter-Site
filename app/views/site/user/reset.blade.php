@extends('admin1.dashboard')

{{-- Web site Title --}}
@section('title')
{{{ Lang::get('user/user.forgot_password') }}} ::
@parent
@stop

{{-- Content --}}
@section('content')
{{ Confide::makeResetPasswordForm($token)->render() }}
@stop
