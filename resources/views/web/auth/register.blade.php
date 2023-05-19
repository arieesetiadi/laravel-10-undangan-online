<!DOCTYPE html>
<html lang="en">

<head>
    {{-- Include Page Meta --}}
    @include('cms.layouts.meta')

    {{-- Include Styles --}}
    @include('cms.layouts.styles')

    {{-- Target --}}
    <title>{{ $title ?? 'Title' }} | {{ config('app.name') }}</title>
</head>

<body>
    <div class="app app-auth-sign-up align-content-stretch d-flex flex-wrap justify-content-end">
        <div class="app-auth-background"></div>
        <div class="app-auth-container">
            <form id="register" action="{{ route('web.auth.register.process') }}" method="POST"> @csrf
                <div class="logo">
                    <a href="">{{ __('auth.register.word') }}</a>
                </div>
                <p class="auth-description">
                    {{ __('auth.account.question.registered') }}
                    <a href="{{ route('web.auth.login.index') }}" class="text-decoration-none">{{ __('auth.login.word') }}</a>
                </p>

                <div class="auth-credentials m-b-xxl">
                    <div class="m-b-md">
                        <label for="username" class="form-label d-block">{{ __('general.words.attributes.username') }}</label>
                        <input name="username" type="text" class="form-control" id="username" aria-describedby="username" placeholder="e.g. robert" value="{{ old('username') }}">
                        @error('username')
                            <label for="username" class="mt-2 text-danger">
                                {{ $message }}
                            </label>
                        @enderror
                    </div>

                    <div class="m-b-md">
                        <label for="name" class="form-label d-block">{{ __('general.words.attributes.name') }}</label>
                        <input name="name" type="text" class="form-control" id="name" aria-describedby="name" placeholder="e.g. Robert Emerson" value="{{ old('name') }}">
                        @error('name')
                            <label for="name" class="mt-2 text-danger">
                                {{ $message }}
                            </label>
                        @enderror
                    </div>

                    <div class="m-b-md">
                        <label for="email" class="form-label d-block">{{ __('general.words.attributes.email') }}</label>
                        <input name="email" type="email" class="form-control" id="email" aria-describedby="email" placeholder="e.g. email@example.com" value="{{ old('email') }}">
                        @error('email')
                            <label for="email" class="mt-2 text-danger">
                                {{ $message }}
                            </label>
                        @enderror
                    </div>

                    <div class="m-b-md">
                        <label for="password" class="form-label d-block">{{ __('general.words.attributes.password') }}</label>
                        <input name="password" type="password" class="form-control" id="password" aria-describedby="password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
                        @error('password')
                            <label for="password" class="mt-2 text-danger">
                                {{ $message }}
                            </label>
                        @enderror
                    </div>
                </div>

                <div class="auth-submit">
                    <button type="submit" class="btn btn-primary">{{ __('auth.register.word') }}</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Include Scripts --}}
    @include('cms.layouts.scripts')

    {{-- Include Sweet Alert --}}
    @include('cms.layouts.swals')

    {{-- Form Validation --}}
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
                label.insertAfter(element);
            },
        });
    </script>
</body>

</html>
