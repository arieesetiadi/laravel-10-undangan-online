<!DOCTYPE html>
<html lang="en">

<head>
    {{-- Include Page Meta --}}
    @include('cms.layouts.meta')

    {{-- Include Styles --}}
    @include('cms.layouts.styles')

    {{-- Target --}}
    <title>{{ $title ?? 'Title' }} | Content Management System</title>
</head>

<body>
    <div class="app app-auth-sign-up align-content-stretch d-flex flex-wrap justify-content-end">
        <div class="app-auth-background"></div>
        <div class="app-auth-container">
            <form id="register" action="{{ route('cms.auth.register.process') }}" method="POST"> @csrf
                <div class="logo">
                    <a href="">CMS Register</a>
                </div>
                <p class="auth-description">Please enter your credentials to create an account.<br>Already have an
                    account?
                    <a href="{{ route('cms.auth.login.index') }}" class="text-decoration-none">Login</a>
                </p>

                <div class="auth-credentials m-b-xxl">
                    <div class="m-b-md">
                        <label for="username" class="form-label d-block">Username</label>
                        <input name="username" type="text" class="form-control" id="username"
                            aria-describedby="username" placeholder="e.g. robert" value="{{ old('username') }}">
                        @error('username')
                            <label for="username" class="mt-2 text-danger">
                                {{ $message }}
                            </label>
                        @enderror
                    </div>

                    <div class="m-b-md">
                        <label for="name" class="form-label d-block">Name</label>
                        <input name="name" type="text" class="form-control" id="name" aria-describedby="name"
                            placeholder="e.g. Robert Emerson" value="{{ old('name') }}">
                        @error('name')
                            <label for="name" class="mt-2 text-danger">
                                {{ $message }}
                            </label>
                        @enderror
                    </div>

                    <div class="m-b-md">
                        <label for="email" class="form-label d-block">Email</label>
                        <input name="email" type="email" class="form-control" id="email"
                            aria-describedby="email" placeholder="e.g. email@example.com" value="{{ old('email') }}">
                        @error('email')
                            <label for="email" class="mt-2 text-danger">
                                {{ $message }}
                            </label>
                        @enderror
                    </div>

                    <div class="m-b-md">
                        <label for="password" class="form-label d-block">Password</label>
                        <input name="password" type="password" class="form-control" id="password"
                            aria-describedby="password"
                            placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
                        @error('password')
                            <label for="password" class="mt-2 text-danger">
                                {{ $message }}
                            </label>
                        @enderror
                    </div>
                </div>

                <div class="auth-submit">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Include Scripts --}}
    @include('cms.layouts.scripts')
</body>

</html>
