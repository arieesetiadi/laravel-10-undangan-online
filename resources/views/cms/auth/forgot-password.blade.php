<!DOCTYPE html>
<html lang="en">

<head>
    {{-- Include Page Meta --}}
    @include('cms.layouts.meta')

    {{-- Include Styles --}}
    @include('cms.layouts.styles')

    {{-- Title --}}
    <title>{{ $title ?? 'Title' }} | Content Management System</title>
</head>

<body>
    <div class="app app-auth-sign-in align-content-stretch d-flex flex-wrap justify-content-end">
        <div class="app-auth-background"></div>

        {{-- Input Email --}}
        <div class="app-auth-container {{ $email ? 'd-none' : 'd-block' }}">
            <form id="forgot-password-email" action="{{ route('cms.auth.forgot-password.send') }}" method="POST"> @csrf
                <div class="logo">
                    <a href="">CMS Forgot Password</a>
                </div>
                <p class="auth-description">
                    Please enter your email address to proceed with the password reset process.
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
                    <a href="{{ route('cms.auth.login.index') }}" class="auth-forgot-password float-end">
                        Back to Login
                    </a>
                </div>
                <div class="divider"></div>
            </form>
        </div>

        {{-- Input New Password --}}
        <div class="app-auth-container {{ $email ? 'd-block' : 'd-none' }}">
            <form id="forgot-password-reset" action="{{ route('cms.auth.forgot-password.reset') }}" method="POST"> @csrf
                <div class="logo">
                    <a href="">CMS New Password</a>
                </div>
                <p class="auth-description">
                    Please enter your new password in the field provided below.
                </p>

                <div class="auth-credentials m-b-xxl">
                    <input type="hidden" name="email" value="{{ $email }}">

                    <div class="m-b-md">
                        <label for="password" class="form-label d-block">New Password</label>
                        <input name="password" type="password" class="form-control" id="password" aria-describedby="password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
                        @error('password')
                            <label for="password" class="mt-2 text-danger">
                                {{ $message }}
                            </label>
                        @enderror
                    </div>

                    <div class="m-b-md">
                        <label for="password_confirmation" class="form-label d-block">Confirm new Password</label>
                        <input name="password_confirmation" type="password" class="form-control" id="password_confirmation" aria-describedby="password_confirmation" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
                        @error('password')
                            <label for="password_confirmation" class="mt-2 text-danger">
                                {{ $message }}
                            </label>
                        @enderror
                    </div>
                </div>

                <div class="auth-submit">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('cms.auth.login.index') }}" class="auth-forgot-password float-end">
                        Back to Login
                    </a>
                </div>
                <div class="divider"></div>
            </form>
        </div>
    </div>

    {{-- Include Scripts --}}
    @include('cms.layouts.scripts')

    {{-- Custom Scripts --}}
    @pushOnce('after-scripts')
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
                        required: messageRequired('email address'),
                        email: messageEmail(),
                    },
                },
                errorPlacement: function(label, element) {
                    label.addClass(errorMessageClasses());
                    label.insertAfter(element);
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
                        equalTo: 'input[name=password]',
                    },
                },
                messages: {
                    password: {
                        required: messageRequired('password'),
                        minlength: messageMinLength('password', 4),
                    },
                    password_confirmation: {
                        required: messageRequired('password confirmation'),
                        minlength: messageMinLength('password confirmation', 4),
                        equalTo: messageEqualTo('password'),
                    },
                },
                errorPlacement: function(label, element) {
                    label.addClass(errorMessageClasses());
                    label.insertAfter(element);
                },
            });
        </script>
    @endPushOnce
</body>

</html>
