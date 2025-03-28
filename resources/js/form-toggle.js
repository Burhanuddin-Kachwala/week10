$(document).ready(function () {
    // Profile Edit Mode Handling
    $("#toggle-edit-btn").on("click", function () {
        $("#profile-view-mode, #profile-edit-mode").toggle();
    });

    $("#cancel-edit-btn").on("click", function () {
        $("#profile-view-mode, #profile-edit-mode").toggle();
    });

    // Address Edit Mode Handling
    $("#toggle-address-edit-btn").on("click", function () {
        $("#address-view-mode, #address-edit-mode").toggle();
    });

    $("#cancel-address-edit-btn").on("click", function () {
        $("#address-view-mode, #address-edit-mode").toggle();
    });

    $("#profile-update-form").on("submit", function (e) {
        e.preventDefault(); // Prevent default form submission

        // Collect form data
        const formData = {
            name: $("#name").val(),
            email: $("#email").val(),
        };

        // Send Axios PUT request
        axios
            .put("/profile", formData)
            .then((response) => {
                if(response.data.error){
                    notyf.error(response.data.message);
                }
               
                notyf.success(response.data.message);
                // Success handling
               

                // Update view mode elements with new data
                $("#profile-view-mode #user-name").text(formData.name);
                $("#profile-view-mode #user-email").text(formData.email);

                // Close edit mode and show view mode
                $("#profile-edit-mode").hide();
                $("#profile-view-mode").show();
            })
            .catch((error) => {
                // Error handling
                if (error.response && error.response.data.errors) {
                    // Laravel validation errors
                    const errors = error.response.data.errors;
                    let errorMessage = "";

                    if (errors.name) {
                        errorMessage += errors.name[0] + "\n";
                        $("#name").addClass("border-red-500");
                    }

                    if (errors.email) {
                        errorMessage += errors.email[0] + "\n";
                        $("#email").addClass("border-red-500");
                    }

                    notyf.error(response.message);
                } else {
                    // Generic error
                    notyf.error(                        
                        "An unexpected error occurred. Please try again."
                    );
                }
            });
    });

    $("#address-update-form").on("submit", function (e) {
        e.preventDefault(); // Prevent default form submission

        // Collect form data
        const formData = {
            address_line_1: $("#address_line_1").val(),
            address_line_2: $("#address_line_2").val(),
            city: $("#city").val(),
            state: $("#state").val(),
            postal_code: $("#postal_code").val(),
        };

        // Send Axios PUT request to update address
        axios
            .put("/address", formData) // Adjust the URL as per your routes
            .then((response) => {
                if (response.data.success) {
                    notyf.success(response.data.message);
                }

                // Success handling (You can update the address view here)
                $("#address-view-mode .address-line-1").text(
                    formData.address_line_1
                );
                $("#address-view-mode .address-line-2").text(
                    formData.address_line_2
                );
                $("#address-view-mode .city").text(formData.city);
                $("#address-view-mode .state").text(formData.state);
                $("#address-view-mode .postal-code").text(formData.postal_code);

                // Close edit mode and show view mode
                $("#address-edit-mode").hide();
                $("#address-view-mode").show();
            })
            .catch((error) => {
                // Error handling
                if (error.response && error.response.data.errors) {
                    const errors = error.response.data.errors;
                    let errorMessage = "";

                    if (errors.address_line_1) {
                        errorMessage += errors.address_line_1[0] + "\n";
                        $("#address_line_1").addClass("border-red-500");
                    }

                    if (errors.city) {
                        errorMessage += errors.city[0] + "\n";
                        $("#city").addClass("border-red-500");
                    }

                    if (errors.state) {
                        errorMessage += errors.state[0] + "\n";
                        $("#state").addClass("border-red-500");
                    }

                    if (errors.postal_code) {
                        errorMessage += errors.postal_code[0] + "\n";
                        $("#postal_code").addClass("border-red-500");
                    }

                    notyf.error(errorMessage);
                } else {
                    // Generic error handling
                    notyf.error(
                        "An unexpected error occurred. Please try again."
                    );
                }
            });
    });


    // Optional: Clear error styling when user starts typing
    $("#name, #email").on("input", function () {
        $(this).removeClass("border-red-500");
    });
});
