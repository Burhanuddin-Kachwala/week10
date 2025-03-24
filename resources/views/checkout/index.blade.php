<x-layout>
    <!-- Checkout Container -->
    <div class="container mx-auto my-10 p-8 bg-white rounded-lg shadow-lg max-w-4xl">

        <h1 class="text-3xl font-semibold mb-8 text-center text-blue-600">Secure Checkout</h1>

        <div class="flex justify-between">
            <!-- Cart Items Section (Left Side) -->
            <div class="w-2/3">
                <div class="mb-8 space-y-6">
                    @foreach($cartItems as $item)
                    <div class="flex items-center justify-between p-4 border rounded-lg hover:shadow-md transition">
                        <div class="flex items-center">
                            <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }} "
                                class="w-24 h-32 rounded-lg">
                            <div class="ml-6">
                                <h2 class="text-lg font-semibold">{{ $item['name'] }}</h2>
                                <p class="text-gray-600 mt-1">₹{{ number_format($item['price'], 2) }} x {{
                                    $item['quantity'] }}</p>
                            </div>
                        </div>
                        <p class="text-lg font-bold text-green-600">₹{{ number_format($item['price'] *
                            $item['quantity'], 2) }}</p>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Order Summary Section (Right Side) -->
            <div class="w-1/3 pl-8">
                @php
                $totalAmount = collect($cartItems)->sum(fn($item) => $item['price'] * $item['quantity']);
                @endphp
                <div class="bg-blue-50 p-6 rounded-lg mb-8">
                    <h2 class="text-xl font-semibold mb-4">Order Summary</h2>
                    <p class="text-sm">Total Items: <span class="font-bold">{{ count($cartItems) }}</span></p>
                    <p class="text-xl font-bold mt-4">Total: ₹{{ number_format($totalAmount, 2) }}</p>
                </div>
            </div>
        </div>

        <!-- Checkout Form -->
        <form action="{{route('checkout')}}" method="POST" class="space-y-6">
            @csrf
            @foreach($cartItems as $item)
            <input type="hidden" name="items[]" value="{{ json_encode($item) }}">
            @endforeach

            <!-- Display User Info (If Authenticated) -->
            @auth('user')
            <div class="mb-6 p-4 bg-blue-50 border-l-4 border-blue-500 rounded-lg">
                <p class="text-sm"><strong>Name:</strong> {{ Auth::user()->name }}</p>
                <p class="text-sm"><strong>Email:</strong> {{ Auth::user()->email }}</p>

                <!-- Display Auth User's Address -->
                @if(Auth::user()->addresses->isNotEmpty())
                <div class="mt-4">
                    <p class="text-sm capitalize"><strong>{{ Auth::user()->addresses->first()->type }} Address:</strong>
                    </p>
                    <p class="text-gray-700 text-sm">{{ Auth::user()->addresses->first()->address_line_1 }}<br>
                        {{ Auth::user()->addresses->first()->address_line_2 }}<br>
                        {{ Auth::user()->addresses->first()->city }}, {{ Auth::user()->addresses->first()->state }}<br>
                        {{ Auth::user()->addresses->first()->postal_code }}<br>
                        {{ Auth::user()->addresses->first()->country }}</p>

                    <!-- Link to Manage Addresses -->
                    <a href="{{ route('addresses') }}"
                        class="text-blue-600 hover:underline flex items-center mt-2 text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 11H6M12 5l-7 7 7 7"></path>
                        </svg>
                        <span>Add Address</span>
                    </a>
                </div>
                @else
                <!-- No Address, Redirect to Add Address -->
                <div class="mt-4">
                    <p class="text-sm"><strong>Shipping Address:</strong> Not Available</p>
                    <a href="{{ route('addresses') }}"
                        class="text-blue-600 hover:underline flex items-center mt-2 text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 11H6M12 5l-7 7 7 7"></path>
                        </svg>
                        <span>Add Your Address</span>
                    </a>
                </div>
                @endif
            </div>
            @endauth

            <!-- Checkout Button (Disabled If No Address) -->
            <button type="submit"
                class="w-full bg-blue-600 text-white py-4 rounded-lg hover:bg-blue-800 transition text-sm"
                @if(Auth::check() && Auth::user()->addresses->isEmpty()) disabled @endif>
                Confirm & Place Order
            </button>
        </form>

        <!-- Back to Cart Button -->
        <div class="text-center mt-8">
            <a href="{{ route('cart.index') }}" class="text-blue-600 hover:underline text-sm">← Modify Your Cart</a>
        </div>

    </div>
</x-layout>