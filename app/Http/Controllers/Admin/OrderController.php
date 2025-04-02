<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Jobs\SendEmail;
use App\Mail\OrderShipped;
use App\Mail\OrderCancelled;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Mail\OrderDelivered;

class OrderController extends Controller
{
    public function updateStatus(Request $request)
    {
        Log::info('Received order update request', [
            'order_id' => $request->input('order_id'),
            'status' => $request->input('status')
        ]);
        
        // Validate the request
        $validated = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'status' => 'required|in:pending,processing,shipped,delivered,cancelled'
        ]);

        try {
            // Find the order
            $order = Order::findOrFail($request->order_id);

            // Update the status
            $order->status = $request->status;
            $order->save();
            // Dispatch email job if status is 'shipped'
            if ($order->status === 'shipped') {
                dispatch(new SendEmail(new OrderShipped($order), $order->user->email));
            }
            if ($order->status === 'delivered') {
                dispatch(new SendEmail(new OrderDelivered($order), $order->user->email));
            }
            if ($order->status === 'cancelled') {
                dispatch(new SendEmail(new OrderCancelled($order), $order->user->email));
            }

            // Return success response
            return response()->json([
                'success' => true,
                'message' => 'Order status updated successfully'
            ]);
        } catch (\Exception $e) {
            // Return error response
            return response()->json([
                'success' => false,
                'message' => 'Failed to update order status'
            ], 500);
        }
    }

    public function getOrderDetails(Request $request)
    {
        $orderId = $request->input('order_id');
        $order = Order::with(['user', 'orderItems'])->findOrFail($orderId);

        return view('admin.orders.details_partial', compact('order'));
    }
}
