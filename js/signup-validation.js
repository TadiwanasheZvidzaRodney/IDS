$(document).ready(function() {
    $("#signup_first").validate({
        rules: {
            name: {
                required: true,
                minlength: 3
            },
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 8
            },
            contact: {
                required: true,
                minlength: 10,
                maxlength: 15,
                // Allow digits, spaces, dashes, and parentheses
                pattern: /^[0-9\-\(\)\s]+$/
            }
        },
        messages: {
            name: {
                required: "Please enter your name",
                minlength: "Name must be at least 3 characters long"
            },
            email: {
                required: "Please enter your email",
                email: "Please enter a valid email address"
            },
            password: {
                required: "Please enter a password",
                minlength: "Password must be at least 8 characters long"
            },
            contact: {
                required: "Please enter your contact number",
                minlength: "Contact number must be at least 10 digits",
                maxlength: "Contact number cannot exceed 15 digits",
                pattern: "Please enter a valid contact number"
            }
        },
        errorElement: 'span',
        errorClass: 'error',
        submitHandler: function(form) {
            form.submit();
        }
    });
});
