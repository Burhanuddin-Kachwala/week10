<?php
/// app/Http/Controllers/CartController.php
namespace App\Http\Controllers;

use App\Services\CartService;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    protected $cartService;

    /**
     * Create a new controller instance.
     *
     * @param CartService $cartService
     * @return void
     */
    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    /**
     * Display cart page
     *
     * @return View
     */
    public function index()
    {
        try {
            $cartItems = $this->cartService->getCart();
            $cartTotal = $this->cartService->getCartTotal();

            return view('cart.index', compact('cartItems', 'cartTotal'));
        } catch (\Exception $e) {
            Log::error('Failed to load cart page: ' . $e->getMessage());
            return redirect()->route('cart.index')->with('error', 'Failed to load cart data.');
        }
    }

    /**
     * Add product to cart
     *
     * @param StoreCartRequest $request
     * @return RedirectResponse|JsonResponse
     */
    public function addToCart(StoreCartRequest $request): RedirectResponse|JsonResponse
    {
        try {
            $productId = $request->input('product_id');
            $quantity = $request->input('quantity', 1);

            $result = $this->cartService->addToCart($productId, $quantity);

            if ($request->ajax()) {
                return response()->json($result);
            }

            return redirect()->back()->with('success', $result['message']);
        } catch (\Exception $e) {
            Log::error('Failed to add product to cart: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to add product to cart.');
        }
    }

    /**
     * Update cart item quantity
     *
     * @param UpdateCartRequest $request
     * @return RedirectResponse|JsonResponse
     */
    public function updateCart(UpdateCartRequest $request): RedirectResponse|JsonResponse
    {
        try {
            $productId = $request->input('product_id');
            $quantity = $request->input('quantity');

            $updated = $this->cartService->updateCartItem($productId, $quantity);

            if ($request->ajax()) {
                return response()->json([
                    'success' => $updated,
                    'cart_total' => $this->cartService->getCartTotal(),
                    'cart_count' => count($this->cartService->getCart())
                ]);
            }

            return redirect()->route('cart.index')->with('success', 'Cart updated successfully');
        } catch (\Exception $e) {
            Log::error('Failed to update cart item: ' . $e->getMessage());
            return redirect()->route('cart.index')->with('error', 'Failed to update cart item.');
        }
    }

    /**
     * Remove item from cart
     *
     * @param Request $request
     * @return RedirectResponse|JsonResponse
     */
    public function removeFromCart(Request $request): RedirectResponse|JsonResponse
    {
        try {
            $request->validate([
                'product_id' => 'required|integer'
            ]);

            $productId = $request->input('product_id');
            $removed = $this->cartService->removeFromCart($productId);

            if ($request->ajax()) {
                return response()->json([
                    'success' => $removed,
                    'cart_total' => $this->cartService->getCartTotal(),
                    'cart_count' => count($this->cartService->getCart())
                ]);
            }

            return redirect()->route('cart.index')->with('success', 'Item removed from cart');
        } catch (\Exception $e) {
            Log::error('Failed to remove item from cart: ' . $e->getMessage());
            return redirect()->route('cart.index')->with('error', 'Failed to remove item from cart.');
        }
    }

    /**
     * Clear entire cart
     *
     * @return RedirectResponse
     */
    public function clearCart(): RedirectResponse
    {
        try {
            $this->cartService->clearCart();

            return redirect()->route('cart.index')->with('success', 'Cart cleared successfully');
        } catch (\Exception $e) {
            Log::error('Failed to clear cart: ' . $e->getMessage());
            return redirect()->route('cart.index')->with('error', 'Failed to clear cart.');
        }
    }
}
