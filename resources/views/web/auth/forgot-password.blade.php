<!DOCTYPE html>
<html lang="en">

<head>
    {{-- Include Page Meta --}}
    @include('cms.layouts.meta')

    {{-- Include Styles --}}
    @include('cms.layouts.styles')

    {{-- Title --}}
    <title>{{ $title ?? 'Title' }} | {{ config('app.name') }}</title>
</head>

<body>
    <div class="app app-auth-sign-in align-content-stretch d-flex flex-wrap justify-content-end">
        <div class="app-auth-background"></div>

        {{-- Input Email --}}
        <div class="app-auth-container {{ $email ? 'd-none' : 'd-block' }}">
            <form id="forgot-password-email" action="{{ route('web.auth.forgot-password.send', app()->getLocale()) }}" method="POST"> @csrf
                <div class="logo">
                    <a href="">{{ __('auth.password_reset.word') }}</a>
                </div>
                <p class="auth-description">
                    {{ __('auth.password_reset.description_1') }}
                </p>

                <div class="auth-credentials m-b-xxl">
                    <div class="m-b-md">
                        <label for="email" class="form-label d-block">Email</label>
                        <input name="email" type="text" class="form-control" id="email" aria-describedby="email" placeholder="e.g. email@example.com">
                        @error('email')
                            <label for="email" class="mt-2 text-danger">
                                {{ $message }}
                            </label>
                        @enderror
                    </div>
                </div>

                <div class="auth-submit">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('web.auth.login.index', app()->getLocale()) }}" class="auth-forgot-password float-end">
                        {{ __('auth.login.back') }}
                    </a>
                </div>
                <div class="divider"></div>
            </form>
        </div>

        {{-- Input New Password --}}
        <div class="app-auth-container {{ $email ? 'd-block' : 'd-none' }}">
            <form id="forgot-password-reset" action="{{ route('web.auth.forgot-password.reset', app()->getLocale()) }}" method="POST"> @csrf
                <div class="logo">
                    <a href="">{{ __('auth.password_reset.word') }}</a>
                </div>
                <p class="auth-description">
                    {{ __('auth.password_reset.description_2') }}
                </p>

                <div class="auth-credentials m-b-xxl">
                    <input type="hidden" name="email" value="{{ $email }}">

                    <div class="m-b-md">
                        <div class="d-flex">
                            <label for="password" class="form-label d-block">{{ __('general.words.attributes.new_password') }}</label>
                            <div class="d-inline-block px-5 form-check form-switch">
                                <input name="toggle-password" class="form-check-input" type="checkbox" tabindex="-1" id="toggle-password" onchange="togglePassword(event, 'password')">
                            </div>
                        </div>
                        <input name="password" type="password" class="form-control" id="password" aria-describedby="password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
                        @error('password')
                            <label for="password" class="mt-2 text-danger">
                                {{ $message }}
                            </label>
                        @enderror
                    </div>

                    <div class="m-b-md">
                        <div class="d-flex">
                            <label for="password_confirmation" class="form-label d-block">{{ __('general.words.attributes.new_password_confirmation') }}</label>
                            <div class="d-inline-block px-5 form-check form-switch">
                                <input name="toggle-password" class="form-check-input" type="checkbox" tabindex="-1" id="toggle-password" onchange="togglePassword(event, 'password_confirmation')">
                            </div>
                        </div>
                        <input name="password_confirmation" type="password" class="form-control" id="password_confirmation" aria-describedby="password_confirmation" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
                        @error('password')
                            <label for="password_confirmation" class="mt-2 text-danger">
                                {{ $message }}
                            </label>
                        @enderror
                    </div>
                </div>

                <div class="auth-submit">
                    <button type="submit" class="btn btn-primary">{{ __('general.actions.submit') }}</button>
                    <a href="{{ route('web.auth.login.index', app()->getLocale()) }}" class="auth-forgot-password float-end">
                        {{ __('auth.login.back') }}
                    </a>
                </div>
                <div class="divider"></div>
            </form>
        </div>
    </div>

    {{-- Include Scripts --}}
    @include('cms.layouts.scripts')

    {{-- Form Validation --}}
    <script>
        $('form#forgot-password-email').validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                },
            },
            messages: {
                email: {
                    required: `{{ __('validation.required', ['attribute' => __('validation.attributes.email')]) }}`,
                    email: `{{ __('validation.email', ['attribute' => __('validation.attributes.email')]) }}`,
                },
            },
            errorPlacement: function(label, element) {
                label.addClass(errorMessageClasses());
                element.parent().append(label);
            },
        });

        $('form#forgot-password-reset').validate({
            rules: {
                password: {
                    required: true,
                    minlength: 4,
                },
                password_confirmation: {
                    required: true,
                    minlength: 4,
                    equalTo: '#password',
                },
            },
            messages: {
                password: {
                    required: `{{ __('validation.required', ['attribute' => __('validation.attributes.password')]) }}`,
                    minlength: `{{ __('validation.min.string', ['attribute' => __('validation.attributes.password'), 'min' => 4]) }}`,
                },
                password_confirmation: {
                    required: `{{ __('validation.required', ['attribute' => __('validation.attributes.password_confirmation')]) }}`,
                    minlength: `{{ __('validation.min.string', ['attribute' => __('validation.attributes.password_confirmation'), 'min' => 4]) }}`,
                    equalTo: `{{ __('validation.confirmed', ['attribute' => __('validation.attributes.password')]) }}`,
                },
            },
            errorPlacement: function(label, element) {
                label.addClass(errorMessageClasses());
                element.parent().append(label);
            },
        });
    </script>
</body>

</html>
