<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Order Shipped - BookSaw</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans">
    <div class="max-w-2xl mx-auto p-8">
        <div class="bg-white shadow-md rounded-lg">
            <div class="bg-blue-600  p-6 text-center">
                <h1 class="text-2xl font-bold text-gray-800">Your Order Has Been Shipped! 🚚</h1>
            </div>

            <div class="p-6">
                <p>Hello {{ $order->user->name }},</p>
                <p>Your order #{{ $order->id }} has been shipped successfully!</p>

                <!-- Order Details -->
                <h2 class="text-xl font-semibold mt-6">Order Summary</h2>
                <table class="w-full mt-4">
                    <thead>
                        <tr>
                            <th class="text-left">Item</th>
                            <th class="text-center">Quantity</th>
                            <th class="text-right">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->orderItems as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td class="text-center">{{ $item->quantity }}</td>
                            <td class="text-right">₹{{ number_format($item->price, 2) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <p class="text-right mt-4 font-bold">Total: ₹{{ number_format($order->total_amount, 2) }}</p>

                <!-- Shipping Address -->
                <h2 class="text-xl font-semibold mt-6">Shipping Address</h2>
                @php
                $shippingAddress = $order->user->addresses->where('type', 'shipping')->first();
                @endphp

                @if ($shippingAddress)
                <div class="mt-4 p-4 bg-gray-50 rounded-lg border">
                    <p>{{ $shippingAddress->address_line_1 }}</p>
                    @if ($shippingAddress->address_line_2)
                    <p>{{ $shippingAddress->address_line_2 }}</p>
                    @endif
                    <p>{{ $shippingAddress->city }}, {{ $shippingAddress->state }} {{ $shippingAddress->postal_code }}
                    </p>
                    <p>{{ $shippingAddress->country }}</p>
                </div>
                @else
                <p>No shipping address available.</p>
                @endif

                <!-- CTA Button -->
                <div class="text-center mt-8">
                    <a href="{{ route('homepage') }}" class="bg-blue-600 text-white py-3 px-6 rounded-lg">Continue
                        Shopping</a>
                </div>

                <!-- Footer -->
                <p class="text-gray-500 text-sm mt-8">Thank you for shopping with BookSaw!</p>
            </div>
        </div>
    </div>
</body>

</html>