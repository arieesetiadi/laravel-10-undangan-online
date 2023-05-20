@php
    use App\Constants\OAuthDriver;
@endphp

<!DOCTYPE html>
<html lang="en">

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
            <div class="row justify-content-center mt-sm-5">
                <div class="col-md-8">
                    <div>
                        <div class="text-center mb-5">
                            <a href="" class="mb-3 d-block auth-logo">
                                <img src="{{ asset('assets/web/images/logo-light.png') }}" alt="Main Logo" height="22" class="logo">
                            </a>
                            <h5 class="font-16 text-white-50">{{ config('app.name') }}</h5>
                        </div>

                        <div class="card">
                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5>{{ __('auth.register.title') }}</h5>
                                    <p>{{ __('auth.register.description') }}</p>
                                </div>

                                <div class="p-2 mt-4">
                                    <form id="register" action="{{ route('web.auth.register.process') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="mb-3 col-6">
                                                <label class="form-label" for="username">{{ __('general.words.attributes.username') }}</label>
                                                <input name="username" type="text" class="form-control" id="username" placeholder="e.g. robert">
                                                @error('username')
                                                    <label for="username" class="mt-2 text-danger">
                                                        {{ $message }}
                                                    </label>
                                                @enderror
                                            </div>

                                            <div class="mb-3 col-6">
                                                <label class="form-label" for="name">{{ __('general.words.attributes.name') }}</label>
                                                <input name="name" type="text" class="form-control" id="name" placeholder="e.g. Robert Emerson">
                                                @error('name')
                                                    <label for="name" class="mt-2 text-danger">
                                                        {{ $message }}
                                                    </label>
                                                @enderror
                                            </div>

                                            <div class="mb-3 col-6">
                                                <label class="form-label" for="email">{{ __('general.words.attributes.email') }}</label>
                                                <input name="email" type="text" class="form-control" id="email" placeholder="e.g. robert@example.com">
                                                @error('email')
                                                    <label for="email" class="mt-2 text-danger">
                                                        {{ $message }}
                                                    </label>
                                                @enderror
                                            </div>

                                            <div class="mb-3 col-6">
                                                <div class="d-flex">
                                                    <label class="form-label" for="password">{{ __('general.words.attributes.password') }}</label>
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
                                        </div>

                                        <div class="mt-3 d-grid">
                                            <button class="btn btn-primary" type="submit">
                                                <i class="fa-solid fa-right-to-bracket d-inline-block mr-1"></i> {{ __('auth.register.word') }}
                                            </button>
                                        </div>

                                        <div class="mt-3 d-grid">
                                            <a href="{{ route('web.oauth.redirect', OAuthDriver::GOOGLE) }}" class="btn btn-outline-primary" type="submit">
                                                {!! OAuthDriver::htmlLabel(OAuthDriver::GOOGLE) !!}
                                            </a>
                                        </div>
                                    </form>
                                    <!-- end-form -->
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 text-center text-white-50">
                            <p>
                                {{ __('auth.account.question.registered') }}
                                <a href="{{ route('web.auth.login.index') }}" class="font-weight-semibold text-white">{{ __('auth.login.word') }}</a>
                            </p>
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

    <script>
        $('form#register').validate({
            rules: {
                username: {
                    required: true,
                },
                name: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true,
                },
                password: {
                    required: true,
                    minlength: 4,
                }
            },
            messages: {
                username: {
                    required: `{{ __('validation.required', ['attribute' => __('validation.attributes.username')]) }}`,
                },
                name: {
                    required: `{{ __('validation.required', ['attribute' => __('validation.attributes.name')]) }}`,
                },
                email: {
                    required: `{{ __('validation.required', ['attribute' => __('validation.attributes.email')]) }}`,
                    email: `{{ __('validation.email', ['attribute' => __('validation.attributes.email')]) }}`,
                },
                password: {
                    required: `{{ __('validation.required', ['attribute' => __('validation.attributes.password')]) }}`,
                    minlength: `{{ __('validation.min.string', ['attribute' => __('validation.attributes.password'), 'min' => 4]) }}`,
                }
            },
            errorPlacement: function(label, element) {
                label.addClass(errorMessageClasses());
                element.parent().append(label);
            },
        });
    </script>
</body>

</html>
