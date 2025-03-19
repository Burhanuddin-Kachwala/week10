$(document).ready(function() {
    $("#login-form").validate({
        rules: {
            email: {
                required: true,
                email: true,
            },
            password: {
                required: true,
                minlength: 6,
            },
        },
        messages: {
            email: {
                required: "Please enter your email",
                email: "Please enter a valid email address",
            },
            password: {
                required: "Please enter your password",
                minlength: "Your password must be at least 6 characters long",
            },
        },
        errorPlacement: function (error, element) {
            error.addClass("text-red-500 italic text-sm");
            error.insertAfter(element);
        },
        submitHandler: function (form) {
            // Submit form if valid
            form.submit();
        },
    });

    $("#register-form").validate({
        rules: {
            name: {
                required: true,
                minlength: 2,
            },
            email: {
                required: true,
                email: true,
                remote: {
                    url: "/check-user-email",
                    type: "GET",
                    data: {
                        email: function () {
                            return $("#email").val();
                        },
                    },
                    dataFilter: function (response) {
                        let json = JSON.parse(response);
                        return json.exists ? "false" : "true"; // "false" means name exists, validation fails
                    },
                },
            },
            password: {
                required: true,
                minlength: 8,
            },
            password_confirmation: {
                required: true,
                minlength: 6,
                equalTo: "#password", // Ensures the password confirmation matches the password field
            },
        },
        messages: {
            name: {
                required: "Please enter your name",
                minlength: "Your name must be at least 2 characters long",
            },
            email: {
                required: "Please enter your email",
                email: "Please enter a valid email address",
                remote: "This email is already taken.",
            },
            password: {
                required: "Please enter your password",
                minlength: "Your password must be at least 6 characters long",
            },
            password_confirmation: {
                required: "Please confirm your password",
                minlength:
                    "Your confirmation password must be at least 6 characters long",
                equalTo: "Password confirmation must match the password",
            },
        },
        errorPlacement: function (error, element) {
            error.addClass("text-red-500 italic text-sm");
            error.insertAfter(element);
        },
        submitHandler: function (form) {
            // Submit form if valid
            form.submit();
        },
    });

    $("#admin-login-form").validate({
        rules: {
            email: {
                required: true,
                email: true,
            },
            password: {
                required: true,
                minlength: 6,
            },
        },
        messages: {
            email: {
                required: "Please enter your email",
                email: "Please enter a valid email address",
            },
            password: {
                required: "Please enter your password",
                minlength: "Your password must be at least 6 characters long",
            },
        },
        errorPlacement: function (error, element) {
            error.addClass("text-red-500 italic text-sm");
            error.insertAfter(element);
        },
        submitHandler: function (form) {
            // Submit form if valid
            form.submit();
        },
    });

    $("#register-product").validate({
        rules: {
            name: {
                required: true,
                minlength: 2,
            },
            category: {
                required: true,
            },
            author: {
                required: true,
            },
            description: {
                required: true,
                minlength: 10,
            },
            image: {
                required: true,
                extension: "jpeg|jpg|png",
            },
            price: {
                required: true,
                number: true,
                min: 1,
            },
            quantity: {
                required: true,
                number: true,
                min: 1,
            },
        },
        messages: {
            name: {
                required: "Please enter the product name",
                minlength: "Product name must be at least 2 characters long",
            },
            category: {
                required: "Please select a category",
            },
            author: {
                required: "Please select an author",
            },
            description: {
                required: "Please enter a description",
                minlength: "Description must be at least 10 characters long",
            },
            image: {
                required: "Please upload an image",
                extension: "Only jpeg, jpg, and png files are allowed",
            },
            price: {
                required: "Please enter the price",
                number: "Please enter a valid number",
                min: "Price must be at least 1",
            },
            quantity: {
                required: "Please enter the quantity",
                number: "Please enter a valid number",
                min: "Quantity must be at least 1",
            },
        },
        errorPlacement: function (error, element) {
            error.addClass("text-red-500 italic text-sm");
            error.insertAfter(element);
        },
        submitHandler: function (form) {
            // Submit form if valid
            form.submit();
        },
    });

    $("#edit-product").validate({
        rules: {
            name: {
                required: true,
                minlength: 2,
            },
            category: {
                required: true,
            },
            author: {
                required: true,
            },
            description: {
                required: true,
                minlength: 10,
            },
            image: {
                extension: "jpeg|jpg|png",
            },
            price: {
                required: true,
                number: true,
                min: 1,
            },
            quantity: {
                required: true,
                number: true,
                min: 1,
            },
            status: {
                required: true,
            },
        },
        messages: {
            name: {
                required: "Please enter the product name",
                minlength: "Product name must be at least 2 characters long",
            },
            category: {
                required: "Please select a category",
            },
            author: {
                required: "Please select an author",
            },
            description: {
                required: "Please enter a description",
                minlength: "Description must be at least 10 characters long",
            },
            image: {
                extension: "Only jpeg, jpg, and png files are allowed",
            },
            price: {
                required: "Please enter the price",
                number: "Please enter a valid number",
                min: "Price must be at least 1",
            },
            quantity: {
                required: "Please enter the quantity",
                number: "Please enter a valid number",
                min: "Quantity must be at least 1",
            },
            status: {
                required: "Please select a status",
            },
        },
        errorPlacement: function (error, element) {
            error.addClass("text-red-500 italic text-sm");
            error.insertAfter(element);
        },
        submitHandler: function (form) {
            // Submit form if valid
            form.submit();
        },
    });

    $("#edit-user").validate({
        rules: {
            name: {
                required: true,
                minlength: 2,
            },
            email: {
                required: true,
                email: true,
            },
            password: {
                minlength: 8,
            },
            status: {
                required: true,
            },
        },
        messages: {
            name: {
                required: "Please enter your name",
                minlength: "Your name must be at least 2 characters long",
            },
            email: {
                required: "Please enter your email",
                email: "Please enter a valid email address",
            },
            password: {
                minlength: "Your password must be at least 8 characters long",
            },
            status: {
                required: "Please select a status",
            },
        },
        errorPlacement: function (error, element) {
            error.addClass("text-red-500 italic text-sm");
            error.insertAfter(element);
        },
        submitHandler: function (form) {
            // Submit form if valid
            form.submit();
        },
    });

    $("#edit-author").validate({
        rules: {
            name: {
                required: true,
                minlength: 2,
                nameExists: true,
                
            },
            bio: {
                required: true,
                minlength: 10,
            },
            image: {
                extension: "jpeg|jpg|png",
            },
        },
        messages: {
            name: {
                required: "Please enter the author name",
                minlength: "Author name must be at least 2 characters long",
                nameExists: "This author name is already taken",
            },
            bio: {
                required: "Please enter the author bio",
                minlength: "Author bio must be at least 10 characters long",
            },
            image: {
                extension: "Only jpeg, jpg, and png files are allowed",
            },
        },
        errorPlacement: function (error, element) {
            error.addClass("text-red-500 italic text-sm");
            error.insertAfter(element);
        },
        submitHandler: function (form) {
            // Submit form if valid
            form.submit();
        },
    });

     $("#register-author").validate({
         rules: {
             name: {
                 required: true,
                 minlength: 2,
                 remote: {
                     url: "/check-author-name",
                     type: "GET",
                     data: {
                         name: function () {
                             return $("#name").val();
                         },
                     },
                     dataFilter: function (response) {
                        
                         let json = JSON.parse(response);
                         return json.exists ? "false" : "true"; // "false" means name exists, validation fails
                     },
                 },
             },
             bio: {
                 required: true,
                 minlength: 10,
             },
             image: {
                 required: true,
                 extension: "jpeg|jpg|png",
             },
         },
         messages: {
             name: {
                 required: "Please enter the author name",
                 minlength: "Author name must be at least 2 characters long",
                 remote: "This author name is already taken.",
             },
             bio: {
                 required: "Please enter the author bio",
                 minlength: "Author bio must be at least 10 characters long",
             },
             image: {
                 extension: "Only jpeg, jpg, and png files are allowed",
             },
         },
         errorPlacement: function (error, element) {
             error.addClass("text-red-500 italic text-sm");
             error.insertAfter(element);
         },
         submitHandler: function (form) {
             form.submit();
         },
     });

     $("#register-category").validate({
             rules: {
                 name: {
                     required: true,
                     minlength: 2,
                     remote: {
                         url: "/check-category-name",
                         type: "GET",
                         data: {
                             name: function () {
                                 return $("#name").val();
                             },
                         },
                         dataFilter: function (response) {
                            
                             let json = JSON.parse(response);
                             return json.exists ? "false" : "true"; // "false" means name exists, validation fails
                         },
                     },
                 },
                
             },
             messages: {
                 name: {
                     required: "Please enter the category name",
                     minlength: "Category name must be at least 2 characters long",
                     remote: "This category name is already taken.",
                 },
                
             },
             errorPlacement: function (error, element) {
                 error.addClass("text-red-500 italic text-sm");
                 error.insertAfter(element);
             },
             submitHandler: function (form) {
                 form.submit();
             },
         });
          $("#register-category").validate({
             rules: {
                 name: {
                     required: true,
                     minlength: 2,
                    
                 },
                
             },
             messages: {
                 name: {
                     required: "Please enter the category name",
                     minlength: "Category name must be at least 2 characters long",
                    
                 },
                
             },
             errorPlacement: function (error, element) {
                 error.addClass("text-red-500 italic text-sm");
                 error.insertAfter(element);
             },
             submitHandler: function (form) {
                 form.submit();
             },
         });
    
 
     
});

