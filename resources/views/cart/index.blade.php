{{-- resources/views/cart/index.blade.php --}}
<x-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6">Shopping Cart</h1>

        @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4" role="alert">
            {{ session('success') }}
        </div>
        @endif

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
                                        <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}"
                                            class="h-16 w-16 object-cover rounded">
                                        <a href="{{ route('products.show', $item['slug']) }}"
                                            class="ml-4 font-medium text-gray-900">{{ $item['name'] }}</a>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <form action="{{ route('cart.update') }}" method="POST"
                                        class="flex justify-center items-center">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $id }}">
                                        <button type="button" class="quantity-btn bg-gray-200 px-3 py-1 rounded-l"
                                            data-action="decrease">-</button>
                                        <input type="number" name="quantity" min="1" value="{{ $item['quantity'] }}"
                                            class="w-12 text-center border-t border-b py-1">
                                        <button type="button" class="quantity-btn bg-gray-200 px-3 py-1 rounded-r"
                                            data-action="increase">+</button>
                                        <button type="submit" class="ml-2 text-xs text-blue-600">Update</button>
                                    </form>
                                </td>
                                <td class="px-6 py-4 text-right">${{ number_format($item['price'], 2) }}</td>
                                <td class="px-6 py-4 text-right">${{ number_format($item['price'] * $item['quantity'],
                                    2) }}
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <form action="{{ route('cart.remove') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $id }}">
                                        <button type="submit" class="text-red-600 hover:text-red-800">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
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
                        <span>${{ number_format($cartTotal, 2) }}</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span>Shipping</span>
                        <span>Calculated at checkout</span>
                    </div>
                    <hr class="my-2">
                    <div class="flex justify-between mb-2 font-semibold">
                        <span>Total</span>
                        <span>${{ number_format($cartTotal, 2) }}</span>
                    </div>
                    <button class="bg-blue-600 text-white py-2 px-4 rounded-lg w-full mt-4 hover:bg-blue-700">
                        Proceed to Checkout
                    </button>
                </div>
            </div>
        </div>
        @else
        <div class="bg-white rounded-lg shadow-md p-6 text-center">
            <p class="mb-4">Your cart is empty</p>
            <a href="{{ route('homepage') }}"
                class="bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700">
                Continue Shopping
            </a>
        </div>
        @endif
    </div>

    
<script>
   
    $(document).ready(function() {
      
        $('.quantity-btn').on('click', function() {
            const $input = $(this).parent().find('input[name="quantity"]');
            const productId = $(this).parent().find('input[name="product_id"]').val();
            const currentValue = parseInt($input.val());
            const newValue = $(this).data('action') === 'decrease' ? Math.max(1, currentValue - 1) : currentValue + 1;

            // Update the quantity input
            $input.val(newValue);

            // Send an AJAX request to update the cart
            $.ajax({
                
                url: "{{ route('cart.update') }}",
                method: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    product_id: productId,
                    quantity: newValue
                },
                success: function(data) {
                    // Update the cart UI based on the response
                    if (data.success) {
                        // Optionally update the total or cart item count here
                    } else {
                        // Handle errors (if any)
                        alert('Failed to update cart');
                    }
                }
            });
        });
    });
</script>

</x-layout>