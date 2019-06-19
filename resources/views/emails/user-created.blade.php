@component('mail::message')
# Congratulations {{$user->name}}

Your Account Have been Created Successfully!
Click The Button to check your profile.

@component('mail::button', ['url' => url('http://127.0.0.1:8000/home')])
Check Profile
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
