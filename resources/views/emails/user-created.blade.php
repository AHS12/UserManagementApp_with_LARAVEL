@component('mail::message')
# Congratulations {{$user->name}}

Your Account Have been Created Successfully!
Click The Button to check your profile.

@component('mail::button', ['url' => url('http://user.test/home')])
Check Profile
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
