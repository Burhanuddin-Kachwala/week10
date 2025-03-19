<x-admin.layout>
    <div class="container mx-auto py-6">
        <h1 class="text-2xl font-semibold mb-4">Dashboard</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <!-- Total Books -->
            <div class="bg-white shadow-md rounded-md p-4">
                <h2 class="text-lg font-semibold mb-2">Total Books</h2>
                <p class="text-3xl font-bold text-gray-700">120</p>
            </div>

            <!-- Total Categories -->
            <div class="bg-white shadow-md rounded-md p-4">
                <h2 class="text-lg font-semibold mb-2">Total Categories</h2>
                <p class="text-3xl font-bold text-gray-700">15</p>
            </div>

            <!-- Total Orders -->
            <div class="bg-white shadow-md rounded-md p-4">
                <h2 class="text-lg font-semibold mb-2">Total Orders</h2>
                <p class="text-3xl font-bold text-gray-700">500</p>
            </div>

            <!-- Total Revenue -->
            <div class="bg-white shadow-md rounded-md p-4">
                <h2 class="text-lg font-semibold mb-2">Total Revenue</h2>
                <p class="text-3xl font-bold text-gray-700">$25,000</p>
            </div>
        </div>

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
                        <tr>
                            <td class="py-2 px-4">#1234</td>
                            <td class="py-2 px-4">John Doe</td>
                            <td class="py-2 px-4">2023-10-26</td>
                            <td class="py-2 px-4">$50.00</td>
                            <td class="py-2 px-4">Shipped</td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4">#1235</td>
                            <td class="py-2 px-4">Jane Smith</td>
                            <td class="py-2 px-4">2023-10-25</td>
                            <td class="py-2 px-4">$75.00</td>
                            <td class="py-2 px-4">Processing</td>
                        </tr>
                        <!-- More orders here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin.layout>