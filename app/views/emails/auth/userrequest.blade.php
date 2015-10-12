<h1>{{ Lang::get('confide::confide.email.sent_to_admin.subject') }}</h1>

<p>Hello Administrator,</p>

<p>The following individual has requested an account for {{ Lang::get('site.app_name_full') }}:</p>

<ul>
    <li>Name: {{ $user['first_name'] . " " . $user['last_name'] }}</li>
    <li>Email: <a href="mailto:{{ $user['email'] }}">{{ $user['email'] }}</a></li>
</ul>

<p>
    To activate this user, <a href="{{ URL::to("/admin/users/{$user['id']}/edit") }}">Click Here</a>,
    change the 'Activate User' field to 'Yes' and select the user's permissions. <strong>NOTE:
    You have to give the user some type of permissions in order for them to log in.</strong>
</p>

<p>
    {{ Lang::get('confide::confide.email.sent_to_admin.farewell') }}, <br>
    {{ Lang::get('site.app_name_full') . " Team"}}
</p>
