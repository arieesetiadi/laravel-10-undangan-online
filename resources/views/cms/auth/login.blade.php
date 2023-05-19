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
        <div class="app-auth-container">
            <form id="login" action="{{ route('cms.auth.login.process') }}" method="POST"> @csrf
                <div class="logo">
                    <a href="{{ Request::url() }}">CMS Login</a>
                </div>
                <p class="auth-description">
                    Please login to your account and continue to the dashboard.<br>Don't have an account?
                    <a href="{{ route('cms.auth.register.index') }}" class="text-decoration-none">Register</a>
                </p>

                <div class="auth-credentials m-b-xxl">
                    <div class="m-b-md">
                        <label for="username" class="form-label d-block">Username</label>
                        <input name="username" type="text" class="form-control" id="username" aria-describedby="username" placeholder="e.g. robert">
                        @error('username')
                            <label for="username" class="mt-2 text-danger">
                                {{ $message }}
                            </label>
                        @enderror
                    </div>

                    <div class="m-b-md">
                        <label for="password" class="form-label d-block">Password</label>
                        <input name="password" type="password" class="form-control" id="password" aria-describedby="password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
                        @error('password')
                            <label for="password" class="mt-2 text-danger">
                                {{ $message }}
                            </label>
                        @enderror
                    </div>
                </div>

                <div class="auth-submit">
                    <button type="submit" class="btn btn-primary">Login</button>
                    <a href="{{ route('cms.auth.forgot-password.index') }}" class="auth-forgot-password float-end">Forgot password?</a>
                </div>
            </form>
        </div>
    </div>

    {{-- Include Scripts --}}
    @include('cms.layouts.scripts')

    {{-- Custom Scripts --}}
    @pushOnce('after-scripts')
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
                        required: messageRequired('username'),
                    },
                    password: {
                        required: messageRequired('password'),
                    }
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
