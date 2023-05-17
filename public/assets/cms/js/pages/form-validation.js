$(function () {
    // Login
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
        errorPlacement: function (label, element) {
            label.addClass(errorMessageClasses());
            label.insertAfter(element);
        },
    });

    // Register
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
                required: messageRequired('username'),
            },
            name: {
                required: messageRequired('name'),
            },
            email: {
                required: messageRequired('email address'),
                email: messageEmail(),
            },
            password: {
                required: messageRequired('password'),
                minlength: messageMinLength('password', 4),
            }
        },
        errorPlacement: function (label, element) {
            label.addClass(errorMessageClasses());
            label.insertAfter(element);
        },
    });

    // Forgot Password - Email
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
        errorPlacement: function (label, element) {
            label.addClass(errorMessageClasses());
            label.insertAfter(element);
        },
    });

    // Forgot Password - Reset
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
        errorPlacement: function (label, element) {
            label.addClass(errorMessageClasses());
            label.insertAfter(element);
        },
    });

    // Profile Edit
    $('form#profile-edit').validate({
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
            'profile-image': {
                extension: "png|jpe?g",
                filesize: 1048576 // Max 1MB (1024 * 1024)
            },
            password: {
                minlength: 4,
            }
        },
        messages: {
            username: {
                required: messageRequired('username'),
            },
            name: {
                required: messageRequired('name'),
            },
            email: {
                required: messageRequired('email address'),
                email: messageEmail(),
            },
            'profile-image': {
                extension: messageExtension('profile image', 'PNG or JPG'),
                filesize: messageFileSize('profile image', '1MB'),
            },
            password: {
                minlength: messageMinLength('password', 4),
            }
        },
        errorPlacement: function (label, element) {
            label.addClass(errorMessageClasses());
            label.insertAfter(element);
        },
    });

    // Administrator Create
    $('form#administrator-create').validate({
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
            'profile-image': {
                extension: "png|jpe?g",
                filesize: 1048576 // Max 1MB (1024 * 1024)
            },
            password: {
                required: true,
                minlength: 4,
            }
        },
        messages: {
            username: {
                required: messageRequired('username'),
            },
            name: {
                required: messageRequired('name'),
            },
            email: {
                required: messageRequired('email address'),
                email: messageEmail(),
            },
            'profile-image': {
                extension: messageExtension('profile image', 'PNG or JPG'),
                filesize: messageFileSize('profile image', '1MB'),
            },
            password: {
                required: messageRequired('password'),
                minlength: messageMinLength('password', 4),
            }
        },
        errorPlacement: function (label, element) {
            label.addClass(errorMessageClasses());
            label.insertAfter(element);
        },
    });

    // Administrator Edit
    $('form#administrator-create').validate({
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
            'profile-image': {
                extension: "png|jpe?g",
                filesize: 1048576 // Max 1MB (1024 * 1024)
            },
            password: {
                minlength: 4,
            }
        },
        messages: {
            username: {
                required: messageRequired('username'),
            },
            name: {
                required: messageRequired('name'),
            },
            email: {
                required: messageRequired('email address'),
                email: messageEmail(),
            },
            'profile-image': {
                extension: messageExtension('profile image', 'PNG or JPG'),
                filesize: messageFileSize('profile image', '1MB'),
            },
            password: {
                minlength: messageMinLength('password', 4),
            }
        },
        errorPlacement: function (label, element) {
            label.addClass(errorMessageClasses());
            label.insertAfter(element);
        },
    });
});