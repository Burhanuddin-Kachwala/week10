<x-admin.layout>
    <div class="container mx-auto py-6">
        <h1 class="text-2xl font-semibold mb-4">Dashboard</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <!-- Total Books -->
            <div class="bg-white shadow-md rounded-md p-4">
                <h2 class="text-lg font-semibold mb-2">Total Books</h2>
                <p class="text-3xl font-bold text-gray-700">{{ $totalBooks }}</p>
            </div>

            <!-- Total Categories -->
            <div class="bg-white shadow-md rounded-md p-4">
                <h2 class="text-lg font-semibold mb-2">Total Categories</h2>
                <p class="text-3xl font-bold text-gray-700">{{ $totalCategories }}</p>
            </div>

            <!-- Total Orders -->
            <div class="bg-white shadow-md rounded-md p-4">
                <h2 class="text-lg font-semibold mb-2">Total Orders</h2>
                <p class="text-3xl font-bold text-gray-700">{{ $totalOrders }}</p>
            </div>

            <!-- Total Revenue -->
            <div class="bg-white shadow-md rounded-md p-4">
                <h2 class="text-lg font-semibold mb-2">Total Revenue</h2>
                <p class="text-3xl font-bold text-gray-700">₹{{ number_format($totalRevenue, 2) }}</p>
            </div>
        </div>

        <!-- Recent Orders -->
        <div class="mt-6">
            <h2 class="text-xl font-semibold mb-4">Recent Orders</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 bg-gray-100 text-left">Order ID</th>
                            <th class="py-2 px-4 bg-gray-100 text-left">Customer</th>
                            <th class="py-2 px-4 bg-gray-100 text-left">Date</th>
                            <th class="py-2 px-4 bg-gray-100 text-left">Amount</th>
                            <th class="py-2 px-4 bg-gray-100 text-left">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentOrders as $order)
                        <tr>
                            <td class="py-2 px-4">#{{ $order->id }}</td>
                            <td class="py-2 px-4">{{ $order->user->name ?? 'Guest' }}</td>
                            <td class="py-2 px-4">{{ $order->created_at->format('Y-m-d') }}</td>
                            <td class="py-2 px-4">₹{{ number_format($order->total_amount, 2) }}</td>
                            <td class="py-2 px-4">{{ ucfirst($order->status) }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="py-4 text-center text-gray-500">No recent orders available.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin.layout>