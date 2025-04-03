{{-- resources/views/cart/index.blade.php --}}
<x-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6">Shopping Cart</h1>



        @if(count($cartItems) > 0)
        <div class="flex flex-col lg:flex-row gap-8">
            <div class="lg:w-2/3">
                <div class="bg-white rounded-lg shadow-md">
                    <table class="min-w-full">
                        <thead>
                            <tr class="border-b">
                                <th class="px-6 py-3 text-left">Product</th>
                                <th class="px-6 py-3 text-center">Quantity</th>
                                <th class="px-6 py-3 text-right">Price</th>
                                <th class="px-6 py-3 text-right">Total</th>
                                <th class="px-6 py-3"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cartItems as $id => $item)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="h-16 w-16 object-cover rounded">
                                        <a href="{{ route('products.show', $item['slug']) }}" class="ml-4 font-medium text-gray-900">{{ $item['name'] }}</a>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <form action="{{ route('cart.update') }}" method="POST" class="flex justify-center items-center">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $id }}">
                                        <button type="button" class="quantity-btn bg-gray-200 px-3 py-1 rounded-l" data-action="decrease">-</button>
                                        <input type="number" name="quantity" min="1" value="{{ $item['quantity'] }}" class="w-12 text-center border-t border-b py-1">
                                        <button type="button" class="quantity-btn bg-gray-200 px-3 py-1 rounded-r" data-action="increase">+</button>
                                        <button type="submit" class="ml-2 text-xs text-blue-600">Update</button>
                                    </form>
                                </td>
                                <td class="px-6 py-4 text-right">₹{{ number_format($item['price'], 2) }}</td>
                                <td class="px-6 py-4 text-right">₹{{ number_format($item['price'] * $item['quantity'],
                                    2) }}
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <form action="{{ route('cart.remove') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $id }}">
                                        <button type="submit" class="text-red-600 hover:text-red-800">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    <form action="{{ route('cart.clear') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-red-600 hover:text-red-800">Clear Cart</button>
                    </form>
                </div>
            </div>

            <div class="lg:w-1/3">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-lg font-semibold mb-4">Order Summary</h2>
                    <div class="flex justify-between mb-2">
                        <span>Subtotal</span>
                        <span class="cart-total">₹{{ number_format($cartTotal, 2) }}</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span>Shipping</span>
                        <span>Calculated at checkout</span>
                    </div>
                    <hr class="my-2">
                    <div class="flex justify-between mb-2 font-semibold">
                        <span>Total</span>
                        <span class="cart-total">₹{{ number_format($cartTotal, 2) }}</span>
                    </div>

                    <a href="{{ route('checkout.index') }}">
                        <button class="bg-blue-600 text-white py-2 px-4 rounded-lg w-full mt-4 hover:bg-blue-700">
                            Proceed to Checkout
                        </button>
                    </a>

                </div>
            </div>
        </div>
        @else
        <div class="bg-white rounded-lg shadow-md p-6 text-center">
            <p class="mb-4">Your cart is empty</p>
            <a href="{{ route('homepage') }}" class="bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700">
                Continue Shopping
            </a>
        </div>
        @endif
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        console.log(typeof jQuery);
        $(document).ready(function() {
            console.log("JavaScript Loaded!");

            // Fetch CSRF token from meta tag (safer than input field)
            const csrfToken = $('meta[name="csrf-token"]').attr("content");

            // Event listener for quantity buttons
            $(".quantity-btn").on("click", function() {
                // console.log("Quantity button clicked!"); 

                const $button = $(this);
                const $form = $button.closest("form");
                const $quantityInput = $form.find('input[name="quantity"]');
                const productId = $form.find('input[name="product_id"]').val();
                const action = $button.data("action");

                //console.log(`Product ID: ${productId}, Action: ${action}`); 

                let currentQuantity = parseInt($quantityInput.val());
                let newQuantity =
                    action === "decrease" ?
                    Math.max(1, currentQuantity - 1) :
                    currentQuantity + 1;

                // Update the input field value
                $quantityInput.val(newQuantity);

                //console.log(`New Quantity: ${newQuantity}`); 

                // Send AJAX request to update cart
                axios
                    .post($form.attr("action"), {
                        _token: csrfToken
                        , product_id: productId
                        , quantity: newQuantity
                    , })
                    .then((response) => {
                        //console.log("AJAX Response:", response.data); 

                        if (response.data.success) {
                            updateCartUI(productId, newQuantity, response.data);
                        } else {
                            alert("Failed to update cart");
                        }
                    })
                    .catch((error) => {
                        //console.error("AJAX Error:", error.response ? error.response.data : error);
                        alert("An error occurred while updating the cart");
                    });
            });

            // Function to update cart UI dynamically
            function updateCartUI(productId, newQuantity, data) {
                //console.log(`Updating UI for Product ID: ${productId}, New Quantity: ${newQuantity}`);

                // Locate the row for this product
                const $row = $(
                    `input[name="product_id"][value="${productId}"]`
                ).closest("tr");

                // Get price from the third column (index 2)
                const itemPrice = parseFloat(
                    $row.find("td:eq(2)").text().replace("₹", "").replace(",", "")
                );
                const newItemTotal = (itemPrice * newQuantity).toFixed(2);

                // Update total price column (fourth column, index 3)
                $row.find("td:eq(3)").text(
                    `₹${newItemTotal.replace(/\B(?=(\d{3})+(?!\d))/g, ",")}`
                );

                // Update cart total if available
                if (data.cart_total) {
                    $(".cart-total").text(
                        `₹${parseFloat(data.cart_total)
        .toFixed(2)
        .replace(/\B(?=(\d{3})+(?!\d))/g, ",")}`
                    );
                }
                notyf.success("Cart Updtaed");
                // // Visual feedback
                // const $feedback = $('<span class="text-green-500 ml-2">✓</span>');
                // $row.find('td:eq(1)').append($feedback);
                // setTimeout(() => $feedback.fadeOut(300, () => $feedback.remove()), 1000);
            }
        });
       

    </script>
</x-layout>

