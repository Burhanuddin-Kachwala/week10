$(document).ready(function() {
    $("#login-form").validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 6
            }
        },
        messages: {
            email: {
                required: "Please enter your email",
                email: "Please enter a valid email address"
            },
            password: {
                required: "Please enter your password",
                minlength: "Your password must be at least 6 characters long"
            }
        },
        errorPlacement: function(error, element) {
            error.addClass("text-red-500 italic text-sm");
            error.insertAfter(element);
        },
        submitHandler: function(form) {
            // Submit form if valid
            form.submit();
        }
    });

    $("#register-form").validate({
        rules: {
            name: {
                required: true,
                minlength: 2
            },
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 8
            },
            password_confirmation: {
                required: true,
                minlength: 6,
                equalTo: "#password"  // Ensures the password confirmation matches the password field
            }
        },
        messages: {
            name: {
                required: "Please enter your name",
                minlength: "Your name must be at least 2 characters long"
            },
            email: {
                required: "Please enter your email",
                email: "Please enter a valid email address"
            },
            password: {
                required: "Please enter your password",
                minlength: "Your password must be at least 6 characters long"
            },
            password_confirmation: {
                required: "Please confirm your password",
                minlength: "Your confirmation password must be at least 6 characters long",
                equalTo: "Password confirmation must match the password"
            }
        },
        errorPlacement: function(error, element) {
            error.addClass("text-red-500 italic text-sm");
            error.insertAfter(element);
        },
        submitHandler: function(form) {
            // Submit form if valid
            form.submit();
        }
    });

     $("#admin-login-form").validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 6
            }
        },
        messages: {
            email: {
                required: "Please enter your email",
                email: "Please enter a valid email address"
            },
            password: {
                required: "Please enter your password",
                minlength: "Your password must be at least 6 characters long"
            }
        },
        errorPlacement: function(error, element) {
            error.addClass("text-red-500 italic text-sm");
            error.insertAfter(element);
        },
        submitHandler: function(form) {
            // Submit form if valid
            form.submit();
        }
    });
});
