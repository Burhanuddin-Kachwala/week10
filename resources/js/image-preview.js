 $(document).ready(function() {
        // Listen for file input change
        $('#edit-image-input').on('change', function(event) {
            var file = event.target.files[0];
            var reader = new FileReader();
            
            // Check if the file is an image
            if (file && file.type.startsWith('image/')) {
                reader.onload = function(e) {
                    // Set the src of the image-preview element to the selected file
                    $('#image-preview').attr('src', e.target.result);
                };
                
                // Read the selected file as a Data URL
                reader.readAsDataURL(file);
            }
        });
    });