<div class="space-y-4">
    <div class="border-b pb-3 flex items-center justify-between">
        <div>
            <h4 class="font-semibold text-lg text-gray-900">Order #{{ $order->id }}</h4>
            <p class="text-gray-600 text-sm">Placed on: {{ $order->created_at->format('M d, Y H:i') }}</p>
        </div>
        <div>
            @php
            $statusClasses = [
            'pending' => 'bg-yellow-100 text-yellow-700',
            'shipped' => 'bg-blue-100 text-blue-700',
            'delivered' => 'bg-green-100 text-green-700',
            'cancelled' => 'bg-red-100 text-red-700'
            ];
            $statusClass = $statusClasses[$order->status] ?? 'bg-gray-100 text-gray-700';
            @endphp
            <span class="px-3 py-1 text-sm font-medium rounded-full {{ $statusClass }}">
                {{ ucfirst($order->status) }}
            </span>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <h5 class="font-semibold mb-2">Customer Information</h5>
            <p>Name: {{ $order->user->name ?? 'Guest' }}</p>
            <p>Email: {{ $order->user->email ?? $order->email }}</p>
            {{-- <p>Phone: {{ $order->phone }}</p> --}}
        </div>

        {{-- <div>
            <h5 class="font-semibold mb-2">Shipping Address</h5>
            <p>{{ $order->address }}</p>
            <p>{{ $order->city }}, {{ $order->state }} {{ $order->zip_code }}</p>
            <p>{{ $order->country }}</p>
        </div> --}}
    </div>

    <div>
        <h5 class="font-semibold mb-2">Order Items</h5>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2 px-4 bg-gray-100 text-left">Book</th>
                        <th class="py-2 px-4 bg-gray-100 text-left">Price</th>
                        <th class="py-2 px-4 bg-gray-100 text-left">Quantity</th>
                        <th class="py-2 px-4 bg-gray-100 text-left">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->orderItems as $item)
                    <tr>
                        <td class="py-2 px-4">{{ $item->product->name }}</td>
                        <td class="py-2 px-4">₹{{ number_format($item->price, 2) }}</td>
                        <td class="py-2 px-4">{{ $item->quantity }}</td>
                        <td class="py-2 px-4">₹{{ number_format($item->price * $item->quantity, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    
                    {{-- @if($order->discount_amount > 0)
                    <tr>
                        <td colspan="3" class="py-2 px-4 text-right font-semibold">Discount:</td>
                        <td class="py-2 px-4">-₹{{ number_format($order->discount_amount, 2) }}</td>
                    </tr>
                    @endif --}}
                    {{-- <tr>
                        <td colspan="3" class="py-2 px-4 text-right font-semibold">Shipping:</td>
                        <td class="py-2 px-4">₹{{ number_format($order->shipping_fee, 2) }}</td>
                    </tr> --}}
                    <tr>
                        <td colspan="3" class="py-2 px-4 text-right font-semibold">Total:</td>
                        <td class="py-2 px-4 font-bold">₹{{ number_format($order->total_amount, 2) }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <div>
        <h5 class="font-semibold mb-2">Payment Information</h5>
        <p>Payment Method: Cash On Dilievery</p>
        {{-- <p>Payment Status: <span
                class="px-2 py-1 rounded {{ $order->payment_status == 'paid' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">{{
                ucfirst($order->payment_status) }}</span></p>
        @if($order->transaction_id)
        <p>Transaction ID: {{ $order->transaction_id }}</p>
        @endif --}}
       
        
        
    </div>
    <div>
        <h5 class="font-semibold mb-2">Address Information</h5>
        @php
            $address = $order->user->addresses->first();
        @endphp
        <p>
            {{ $address->address_line_1 }}, {{ $address->address_line_2 ? $address->address_line_2 . ',' : '' }} {{
            $address->city }}, {{ $address->state }}, {{ $address->postal_code }}, {{ $address->country }}</p>
    </div>

    
</div>