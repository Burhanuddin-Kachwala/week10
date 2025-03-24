{{-- resources/views/order/confirmation.blade.php --}}
<x-layout>
   
    <div class="container mx-auto my-10 p-8 bg-white rounded-lg shadow-lg max-w-4xl">
        <h1 class="text-3xl font-semibold mb-8 text-center text-blue-600">Order Confirmation</h1>

       

        <div class="mb-8 p-6 bg-blue-50 rounded-lg">
            <h2 class="text-xl font-semibold mb-4">Order #{{ $order->id }} Details</h2>
            <p class="text-sm">Placed on: {{ $order->created_at->format('d M, Y') }}</p>
            <p class="text-sm">Status: <span class="font-semibold text-blue-600">{{ ucfirst($order->status) }}</span>
            </p>

            <h3 class="text-lg font-semibold mt-4">Order Items:</h3>
           
            <div class="space-y-4 mt-2">
                @foreach($order->items as $item)
                <div class="flex items-center justify-between p-4 border rounded-lg">
                    <div class="flex items-center">
                        <img src="{{ asset($item->product->image ) }}" alt="{{ $item->name }}" class="w-24 h-32 rounded-lg">
                        <div class="ml-6">
                            <h2 class="text-lg font-semibold">{{ $item->name }}</h2>
                            <p class="text-gray-600 mt-1">₹{{ number_format($item->price, 2) }} x {{ $item->quantity }}
                            </p>
                        </div>
                    </div>
                    <p class="text-lg font-bold text-green-600">₹{{ number_format($item->price * $item->quantity, 2) }}
                    </p>
                </div>
                @endforeach
            </div>

            <p class="text-xl font-bold mt-4">Total Amount: ₹{{ number_format($order->total_amount, 2) }}</p>
        </div>

        <div class="text-center mt-8">
            <a href="{{ route('homepage') }}" class="text-blue-600 hover:underline text-sm">Return to Home</a>
        </div>
    </div>
</x-layout>