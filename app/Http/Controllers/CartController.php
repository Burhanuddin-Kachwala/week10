<?php
// app/Http/Controllers/CartController.php
namespace App\Http\Controllers;

use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;

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
    public function index(): View
    {
        $cartItems = $this->cartService->getCart();
        $cartTotal = $this->cartService->getCartTotal();

        return view('cart.index', compact('cartItems', 'cartTotal'));
    }

    /**
     * Add product to cart
     *
     * @param Request $request
     * @return RedirectResponse|JsonResponse
     */
    public function addToCart(Request $request): RedirectResponse|JsonResponse
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'sometimes|integer|min:1'
        ]);

        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1);

        $result = $this->cartService->addToCart($productId, $quantity);

        if ($request->ajax()) {
            return response()->json($result);
        }

        return redirect()->back()->with('success', $result['message']);
    }

    /**
     * Update cart item quantity
     *
     * @param Request $request
     * @return RedirectResponse|JsonResponse
     */
    public function updateCart(Request $request): RedirectResponse|JsonResponse
    {
        $request->validate([
            'product_id' => 'required|integer',
            'quantity' => 'required|integer|min:0'
        ]);

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
    }

    /**
     * Remove item from cart
     *
     * @param Request $request
     * @return RedirectResponse|JsonResponse
     */
    public function removeFromCart(Request $request): RedirectResponse|JsonResponse
    {
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
    }

    /**
     * Clear entire cart
     *
     * @return RedirectResponse
     */
    public function clearCart(): RedirectResponse
    {
        $this->cartService->clearCart();

        return redirect()->route('cart.index')->with('success', 'Cart cleared successfully');
    }
}
