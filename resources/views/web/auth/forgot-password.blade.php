<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    {{-- Include Page Meta --}}
    @include('web.layouts.meta')

    {{-- Include Styles --}}
    @include('web.layouts.styles')

    {{-- Title --}}
    <title>{{ $title ?? 'Title' }} | {{ config('app.name') }}</title>
</head>

<body class="bg-primary">
    <div class="authentication-page hero-1 py-5">
        <!-- bg-overlay-img -->
        <div class="bg-overlay overflow-hidden bg-transparent">
            <div class="hero-1-bg"></div>
        </div>

        <div class="container">
            <div class="row justify-content-center  mt-sm-5">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div>
                        <div class="text-center">
                            <a href="{{ route('web.home') }}" class="mb-3 d-block auth-logo">
                                <img src="{{ asset('assets/web/images/logo-light.png') }}" alt="Main Logo" height="22" class="logo">
                            </a>
                            <h5 class="font-16 text-white-50 mb-3">{{ config('app.name') }}</h5>
                        </div>

                        {{-- Locale Switcher --}}
                        <center>
                            <div class="btn-group navbar-btn mb-3" role="group" aria-label="Locale switcher button group">
                                @foreach (AppLocale::values() as $locale)
                                    <a href="{{ route('locale.switch', $locale) }}" type="button" class="btn btn-sm {{ app()->getLocale() == $locale ? 'btn-info' : 'btn-outline-info' }}">
                                        {{ AppLocale::label($locale) }}
                                    </a>
                                @endforeach
                            </div>
                        </center>

                        <div class="card">
                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5>{{ __('auth.password_reset.word') }}</h5>
                                    <p>
                                        @if (!$email)
                                            {{ __('auth.password_reset.description_1') }}
                                        @else
                                            {{ __('auth.password_reset.description_2') }}
                                        @endif
                                    </p>
                                </div>

                                <div class="p-2 mt-4">
                                    @if (!$email)
                                        {{-- First Step --}}
                                        <form id="forgot-password-email" action="{{ route('web.auth.forgot-password.send', app()->getLocale()) }}" method="POST">
                                            @csrf

                                            {{-- Input Email --}}
                                            <div class="mb-3">
                                                <label class="form-label" for="email">
                                                    {{ __('general.words.attributes.email') }}
                                                </label>
                                                <input name="email" type="email" class="form-control" id="email" placeholder="e.g. email@example.com">
                                                @error('email')
                                                    <label for="email" class="mt-2 text-danger">
                                                        {{ $message }}
                                                    </label>
                                                @enderror
                                            </div>

                                            <div class="mt-3 d-grid">
                                                <button class="btn btn-primary" type="submit">
                                                    <i class="fa-solid fa-right-to-bracket d-inline-block mr-1"></i> {{ __('general.actions.submit') }}
                                                </button>
                                            </div>

                                            <div class="mt-4 text-center">
                                                <a href="{{ route('web.auth.login.index', app()->getLocale()) }}" class="text-body">
                                                    {{ __('auth.login.back') }}
                                                </a>
                                            </div>
                                        </form>
                                    @else
                                        {{-- Second Step --}}
                                        <form id="forgot-password-reset" action="{{ route('web.auth.forgot-password.reset', app()->getLocale()) }}" method="POST">
                                            @csrf
                                            {{-- Input Email --}}
                                            <input type="hidden" name="email" value="{{ $email }}">

                                            {{-- Input Password --}}
                                            <div class="mb-3">
                                                <div class="d-flex">
                                                    <label class="form-label" for="password">
                                                        {{ __('general.words.attributes.new_password') }}
                                                    </label>
                                                    <div class="d-inline-block px-5 form-check form-switch">
                                                        <input name="toggle-password" class="form-check-input" type="checkbox" tabindex="-1" id="toggle-password" onchange="togglePassword(event, 'password')">
                                                    </div>
                                                </div>
                                                <input name="password" type="password" class="form-control" id="password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
                                                @error('password')
                                                    <label for="password" class="mt-2 text-danger">
                                                        {{ $message }}
                                                    </label>
                                                @enderror
                                            </div>

                                            {{-- Input Password Confirmation --}}
                                            <div class="mb-3">
                                                <div class="d-flex">
                                                    <label class="form-label" for="username">
                                                        {{ __('general.words.attributes.new_password_confirmation') }}
                                                    </label>
                                                    <div class="d-inline-block px-5 form-check form-switch">
                                                        <input name="toggle-password" class="form-check-input" type="checkbox" tabindex="-1" id="toggle-password" onchange="togglePassword(event, 'password_confirmation')">
                                                    </div>
                                                </div>
                                                <input name="password_confirmation" type="password" class="form-control" id="password_confirmation" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
                                                @error('password_confirmation')
                                                    <label for="password_confirmation" class="mt-2 text-danger">
                                                        {{ $message }}
                                                    </label>
                                                @enderror
                                            </div>

                                            <div class="mt-3 d-grid">
                                                <button class="btn btn-primary" type="submit">
                                                    <i class="fa-solid fa-right-to-bracket d-inline-block mr-1"></i> {{ __('general.actions.submit') }}
                                                </button>
                                            </div>

                                            <div class="mt-4 text-center">
                                                <a href="{{ route('web.auth.login.index', app()->getLocale()) }}" class="text-body">
                                                    {{ __('auth.login.back') }}
                                                </a>
                                            </div>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>

    {{-- Include Scripts --}}
    @include('web.layouts.scripts')

    {{-- Include Sweet Alert --}}
    @include('web.layouts.swals')

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
