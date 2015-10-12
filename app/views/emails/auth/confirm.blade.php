<h1>{{ Lang::get('confide::confide.email.account_confirmation.subject') }}</h1>

<p>Hello {{ $user['first_name'] }},</p>

<p>
    Your account request has been approved. You can log in by
    <a  href="{{ URL::to("/user/login") }}">clicking here</a>.
</p>

<p>
    {{ Lang::get('confide::confide.email.sent_to_admin.farewell') }}, <br>
    {{ Lang::get('site.app_name_full') . " Team"}}
</p>