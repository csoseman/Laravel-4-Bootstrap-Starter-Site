@extends('admin1.dashboard')

{{-- Web site Title --}}
@section('title')
{{{ Lang::get('user/user.register') }}} ::
@parent
@stop

{{-- Content --}}
@section('content')
{{ Confide::makeSignupForm()->render() }}
@stop
