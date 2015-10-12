<h1>{{ Lang::get('confide::confide.email.sent_to_admin.subject') }}</h1>

<p>{{ Lang::get('confide::confide.email.sent_to_admin.greetings', array('name' => $user['first_name'])) }},</p>

<p>{{ Lang::get('confide::confide.email.sent_to_admin.body') }}</p>

<p>
    {{ Lang::get('confide::confide.email.sent_to_admin.farewell') }}, <br>
    {{ Lang::get('site.app_name_full') . " Team"}}
</p>
