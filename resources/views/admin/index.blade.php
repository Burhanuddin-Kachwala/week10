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
            <h2 class="text-xl font-semibold mb-4">Orders</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 bg-gray-100 text-left">Order ID</th>
                            <th class="py-2 px-4 bg-gray-100 text-left">Customer</th>
                            <th class="py-2 px-4 bg-gray-100 text-left">Date</th>
                            <th class="py-2 px-4 bg-gray-100 text-left">Amount</th>
                            <th class="py-2 px-4 bg-gray-100 text-left">Status</th>
                            <th class="py-2 px-4 bg-gray-100 text-left">Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentOrders as $order)
                        <tr>
                            <td class="py-2 px-4">#{{ $order->id }}</td>
                            <td class="py-2 px-4">{{ $order->user->name ?? 'Guest' }}</td>
                            <td class="py-2 px-4">{{ $order->created_at->format('Y-m-d') }}</td>
                            <td class="py-2 px-4">₹{{ number_format($order->total_amount, 2) }}</td>
                            <td class="py-2 px-4" data-order-id="{{ $order->id }}">
                                <select class="form-select" name="status" data-previous-status="{{ $order->status }}">
                                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending
                                    </option>
                                    <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped
                                    </option>
                                    <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : ''
                                        }}>Delivered</option>
                                    <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : ''
                                        }}>Cancelled</option>
                                </select>
                            </td>
                            <td class="py-2 px-4">
                                <button type="button" data-modal-target="orderDetailsModal"
                                    data-modal-toggle="orderDetailsModal" data-order-id="{{ $order->id }}"
                                    class="view-details-btn p-2 rounded-full bg-gray-100 hover:bg-gray-200 transition duration-200">
                                   <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-600 hover:text-gray-800" viewBox="0 0 24 24"
                                    fill="currentColor">
                                    <path
                                        d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zm0 12.5c-2.75 0-5-2.25-5-5s2.25-5 5-5 5 2.25 5 5-2.25 5-5 5zm0-8a3 3 0 100 6 3 3 0 000-6z" />
                                </svg>
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="py-4 text-center text-gray-500">No recent orders available.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
            <div class="mt-2">
                {{$recentOrders->links()}}
            </div>
        </div>
    </div>

    <!-- Flowbite Modal for Order Details -->
    <div id="orderDetailsModal" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900">
                        Order Details
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center"
                        data-modal-hide="orderDetailsModal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6">
                    <div id="orderDetailsContent" class="relative">
                        <div class="flex justify-center items-center">
                            <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-blue-500"></div>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b">
                    <button data-modal-hide="orderDetailsModal" type="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery Script should be loaded first -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Flowbite JS (make sure this is included) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>

    <script>
        $(document).ready(function() {
            // Status update functionality
            $('select[name="status"]').on('change', function() {
                var parentTd = $(this).closest('td');
                var orderId = parentTd.data('order-id');
                var newStatus = $(this).val();
                var previousStatus = $(this).data('previous-status');

                if (!orderId) {
                    notyf.error('Order ID not found');
                    return;
                }

                $.ajax({
                    url: "{{ route('update-order-status') }}",
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        order_id: orderId,
                        status: newStatus
                    },
                    success: function(response) {
                        $(this).data('previous-status', newStatus);
                        notyf.success(response.message);
                    }.bind(this),
                    error: function(error) {
                        $(this).val(previousStatus);
                        notyf.error(error.responseJSON?.message || 'Failed to update order status');
                    }
                });
            });

            // View Details functionality
            $('.view-details-btn').on('click', function() {
                var orderId = $(this).data('order-id');
                
                // Show loading spinner
                $('#orderDetailsContent').html('<div class="flex justify-center items-center"><div class="animate-spin rounded-full h-12 w-12 border-b-2 border-blue-500"></div></div>');
                
                // Fetch order details via AJAX
                $.ajax({
                    url: "{{ route('admin.orders.details') }}",
                    method: 'GET',
                    data: { order_id: orderId },
                    success: function(response) {
                        $('#orderDetailsContent').html(response);
                    },
                    error: function(error) {
                        $('#orderDetailsContent').html('<div class="text-red-500 text-center">Failed to load order details. Please try again.</div>');
                    }
                });
            });
        });
    </script>
</x-admin.layout>