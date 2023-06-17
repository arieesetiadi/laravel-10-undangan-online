@component('mail::message')
{{-- Title --}}
# {{ __('auth.password_reset.mail.title') }}
    
@component('mail::panel')
{{-- Description --}}
{{ __('auth.password_reset.mail.description') }}
@endcomponent

{{-- Button --}}
@component('mail::button', ['url' => $url])
{{ __('general.actions.update') }} {{ __('general.words.attributes.password') }}
@endcomponent
    
<br>

{{-- Noreply --}}
{{ __('general.sentences.no-reply') }} 

<br>
<br>

{{-- Regard --}}
{{ __('general.words.thank') }},

<br>

<strong>{{ config('app.name') }}</strong>
@endcomponent
