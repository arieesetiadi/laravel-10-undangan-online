<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'account' => [
        'word' => 'Account',
        'inactive' => 'Your account is inactive. Please contact the team support for assistance.',
        'question' => [
            'registered' => 'Already have an account?',
            'unregistered' => 'Don\'t have an account?'
        ]
    ],
    'profile' => [
        'word' => 'Profile',
        'update' => [
            'success' => 'Your profile has been updated successfully.',
            'failed' => 'Sorry, we could not complete your profile update at this time. Please check your information and try again.',
        ],
    ],
    'login' => [
        'word' => 'Sign In',
        'title' => 'Welcome',
        'description' => 'Please login to access the website.',
        'remember' => 'Remember me',
        'success' => 'Welcome, you are logged in successfully.',
        'failed' => 'Invalid username or password. Please try again.',
        'throttle' => 'Too many login attempts. Please try again later.',
    ],
    'register' => [
        'word' => 'Sign Up',
        'title' => 'Create Account',
        'description' => 'Please enter your new account credentials.',
        'success' => 'Congratulations, your account has been registered successfully. You can now login using your new account.',
        'failed' => 'Sorry, we could not complete your registration at this time. Please check your information and try again.',
        'sent' => 'Activation link has been sent to your email. Please check your inbox and follow the instructions to activate your account.',
    ],
    'logout' => [
        'word' => 'Sign Out',
    ],
    'password_reset' => [
        'word' => 'Forgot Password',
        'success' => 'Your password has been reset successfully. You can now login to your account using your new password.',
        'failed' => 'Sorry, we could not complete your password reset at this time.',
        'sent' => 'We have sent the password reset link to your email address. Please check your mail inbox.',
    ],
];
