@component('mail::message')
# Congratulations

You are Now An Admin

@component('mail::button', ['url' => url('http://user.test/admin')])
Go to Admin Pannel Now
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
