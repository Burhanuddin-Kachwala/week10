<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Cancelled - BookSaw</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'custom-blue': {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            200: '#bae6fd',
                            300: '#7dd3fc',
                            400: '#38bdf8',
                            500: '#0ea5e9',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            800: '#1e40af',
                            900: '#1e3a8a'
                        }
                    }
                }
            },
            plugins: []
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');
    </style>
</head>

<body class="bg-gray-100 font-sans">
    <div class="max-w-2xl mx-auto px-4 py-8">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="bg-custom-blue-600 text-gray-800 py-4 px-6">
                <h1 class="text-2xl font-bold text-center">Order Cancelled</h1>
            </div>

            <div class="p-6">
                <p class="text-gray-700 mb-4">Hello {{ $order->user->name }},</p>

                <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-6">
                    <p class="text-green-700 font-semibold">❌ Your order #{{ $order->id }} has been Cancelled</p>
                </div>

                <div class="mb-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Order Summary</h2>
                    <table class="w-full text-sm text-gray-700 mb-4">
                        <thead>
                            <tr class="border-b border-gray-200">
                                <th class="pb-2 text-left">Item</th>
                                <th class="pb-2 text-center">Quantity</th>
                                <th class="pb-2 text-right">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->orderItems as $item)
                            <tr class="border-b border-gray-100 last:border-b-0">
                                <td class="py-2">{{ $item->name }}</td>
                                <td class="py-2 text-center">{{ $item->quantity }}</td>
                                <td class="py-2 text-right">₹{{ number_format($item->price, 2) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="text-right">
                        <p class="text-xl font-bold text-gray-900">
                            Total Amount: ₹{{ number_format($order->total_amount, 2) }}
                        </p>
                    </div>
                </div>

                <div class="text-center mb-6">
                    <a href="{{ route('homepage') }}"
                        class="inline-block bg-custom-blue-600 text-white font-semibold py-3 px-6 rounded-lg hover:bg-custom-blue-700 transition duration-300">
                        View Other Products
                    </a>
                </div>

                <div class="text-center text-gray-500 pt-4 border-t border-gray-200">
                    <p>We Are Sorry  for this , Your refund will be processed soon !</p>
                    <p class="text-sm mt-2">Best regards,<br>The BookSaw Team</p>
                </div>
            </div>
        </div>

        <div class="text-center text-gray-500 mt-4 text-sm">
            <p>© {{ date('Y') }} BookSaw. All rights reserved.</p>
        </div>
    </div>
</body>

</html>