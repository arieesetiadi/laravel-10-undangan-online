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
            <div class="row justify-content-center  mt-sm-5">
                <div class="col-md-8 col-lg-6 col-xl-5">
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
                                    <h5>{{ __('auth.login.title') }}</h5>
                                    <p>{{ __('auth.login.description') }}</p>
                                </div>

                                <div class="p-2 mt-4">
                                    <form id="login" action="{{ route('web.auth.login.process') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label" for="username">{{ __('general.words.attributes.username') }}</label>
                                            <input name="username" type="text" class="form-control" id="username" placeholder="e.g. robert">
                                            @error('username')
                                                <label for="username" class="mt-2 text-danger">
                                                    {{ $message }}
                                                </label>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="password">{{ __('general.words.attributes.password') }}</label>
                                            <input name="password" type="password" class="form-control" id="password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
                                            @error('password')
                                                <label for="password" class="mt-2 text-danger">
                                                    {{ $message }}
                                                </label>
                                            @enderror
                                        </div>

                                        <div class="form-check form-switch">
                                            <input name="remember" type="checkbox" class="form-check-input" id="auth-remember-check">
                                            <label class="form-check-label" for="auth-remember-check">{{ __('auth.login.remember') }}</label>
                                        </div>

                                        <div class="mt-3 d-grid">
                                            <button class="btn btn-primary" type="submit">
                                                <i class="fa-solid fa-right-to-bracket d-inline-block mr-1"></i> {{ __('auth.login.word') }}
                                            </button>
                                        </div>

                                        <div class="mt-4 text-center">
                                            <a href="{{ route('web.auth.forgot-password.index') }}" class="text-body">
                                                <i class="mdi mdi-lock mr-1"></i> {{ __('auth.password_reset.word') }}?
                                            </a>
                                        </div>
                                    </form>
                                    <!-- end-form -->
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 text-center text-white-50">
                            <p>
                                {{ __('auth.account.question.unregistered') }}
                                <a href="{{ route('web.auth.register.index') }}" class="font-weight-semibold text-white">{{ __('auth.register.word') }}</a>
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

    {{-- Form Validation --}}
    <script>
        $('form#login').validate({
            rules: {
                username: {
                    required: true
                },
                password: {
                    required: true
                }
            },
            messages: {
                username: {
                    required: `{{ __('validation.required', ['attribute' => __('validation.attributes.username')]) }}`,
                },
                password: {
                    required: `{{ __('validation.required', ['attribute' => __('validation.attributes.password')]) }}`,
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
