<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Services\CartService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    // Display checkout page
    public function index()
    {
        try {
            $cartItems = $this->cartService->getCart();
            $cartTotal = $this->cartService->getCartTotal();

            return view('checkout.index', compact('cartItems', 'cartTotal'));
        } catch (\Exception $e) {
            Log::error('Failed to load cart page: ' . $e->getMessage());
            return redirect()->route('cart.index')->with('error', 'Failed to load cart data.');
        }
    }

    // Store Order
    public function store(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Please login to continue.');
        }

        $cartItems = $this->cartService->getCart();

        // If cart is empty
        if (empty($cartItems)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        try {
            // Calculate total amount
            $totalAmount = $this->cartService->getCartTotal();

            // Create a new order
            $order = Order::create([
                'user_id' => $user->id,
                'total_amount' => $totalAmount,
                'status' => 'pending',
            ]);
           

            // Process each item in the cart
            foreach ($cartItems as $item) {
                $product = Product::find($item['id']);
                
                if (!$product) {
                    $order->delete();
                    return redirect()->route('cart.index')->with('error', 'One of the products is unavailable.');
                }
                Log::info('Inserting Order Item', [
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'name' => $item['name'],
                    'price' => $product->price,
                    'quantity' => $item['quantity']
                ]);
                //dd($order->id, $product->id, $item['name'], $product->price, $item['quantity']);
                // Create and save the order item
                
                $orderItem = OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'name' => $item['name'],
                    'price' => $product->price,
                    'quantity' => $item['quantity'],
                ]);
                
               
                
            }

            // Clear the cart after successful order
            $this->cartService->clearCart();

            return redirect()->route('order.confirmation', ['order' => $order->id])
                ->with('success', 'Your order has been placed successfully!');
        } catch (\Exception $e) {
            Log::error('Order creation failed: ' . $e->getMessage(), ['exception' => $e]);
            return redirect()->route('cart.index')->with('error', 'Something went wrong while placing the order. Please try again.');
        }
    }

    // Order confirmation page
    public function confirmation(Order $order)
    {
        if (!Auth::check() || $order->user_id != Auth::id()) {
            return redirect()->route('home')->with('error', 'You are not authorized to view this order.');
        }

        $order->load('items'); // Ensure order items are loaded

        return view('checkout.confirmation', compact('order'));
    }
}
