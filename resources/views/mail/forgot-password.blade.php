{{-- Start --}}
@component('mail::message')
# {{ $title }}
    
@component('mail::panel')
Please click the button below to continue the password reset process.
@endcomponent

@component('mail::button', ['url' => $url])
Reset Password
@endcomponent
    
<br>
This is an automated message. Please do not reply to this email. <br>
<br>

Thanks,
<br>

<strong>{{ config('app.name') }}</strong>
@endcomponent
{{-- End --}}

