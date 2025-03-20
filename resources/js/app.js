

import './bootstrap';
import './validate.js';
import './image-preview.js';
import.meta.glob([
    '../images/**'
]);

// Add this to your main JS file or include it in a script tag

document.addEventListener('DOMContentLoaded', function() {
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
                    showNotification(data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    });
    
    // Function to update cart count in header
    function updateCartCount(count) {
        const cartCountElement = document.getElementById('cart-count');
        if (cartCountElement) {
            cartCountElement.textContent = count;
            
            // Optional: Add animation effect
            cartCountElement.classList.add('animate-pulse');
            setTimeout(() => {
                cartCountElement.classList.remove('animate-pulse');
            }, 1000);
        }
    }
    
    // Function to show notification
    function showNotification(message) {
        // Create notification element
        const notification = document.createElement('div');
        notification.classList.add('fixed', 'top-4', 'right-4', 'bg-green-500', 'text-white', 'px-4', 'py-2', 'rounded', 'shadow-lg', 'z-50');
        notification.textContent = message;
        
        // Add to DOM
        document.body.appendChild(notification);
        
        // Remove after 3 seconds
        setTimeout(() => {
            notification.classList.add('opacity-0', 'transition-opacity', 'duration-500');
            setTimeout(() => {
                document.body.removeChild(notification);
            }, 500);
        }, 3000);
    }
});
