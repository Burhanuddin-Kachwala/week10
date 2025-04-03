

import './bootstrap';
import './validate.js';
import './image-preview.js';
import './search-suggestion.js';
import './form-toggle.js';
import.meta.glob([
    '../images/**'
]);




// Add this to your main JS file or include it in a script tag

document.addEventListener('DOMContentLoaded', function() {
    const cartCountElement = document.getElementById("cart-count");
    // Handle AJAX form submission for Add to Cart
    const addToCartForms = document.querySelectorAll('.add-to-cart-form');
    
    addToCartForms.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const url = this.getAttribute('action');
            
            fetch(url, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update cart count in header
                    updateCartCount(data.cart_count);
                    
                    // Show notification
                   notyf.success(data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    });
    
    // Function to update cart count in header
    function updateCartCount(count) {
        //const cartCountElement = document.getElementById('cart-count');
        if (cartCountElement) {
            cartCountElement.textContent = count;
            
            // // Optional: Add animation effect
            // cartCountElement.classList.add('animate-pulse');
            // setTimeout(() => {
            //     cartCountElement.classList.remove('animate-pulse');
            // }, 1000);
        }
    }
    
   
});

