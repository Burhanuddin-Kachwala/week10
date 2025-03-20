<?php
// app/Services/CartService.php
namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Session;

class CartService
{
    /**
     * Add a product to the cart
     * 
     * @param int $productId
     * @param int $quantity
     * @return array
     */
    public function addToCart(int $productId, int $quantity = 1): array
    {
        $product = Product::findOrFail($productId);
        $cart = Session::get('cart', []);

        // Check if product exists in cart
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $cart[$productId] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $quantity,
                'image' => $product->image,
                'slug' => $product->slug
            ];
        }

        Session::put('cart', $cart);

        return [
            'success' => true,
            'message' => "{$product->name} added to cart",
            'cart_count' => count($cart),
            'cart_items' => $cart
        ];
    }

    /**
     * Get all cart items
     * 
     * @return array
     */
    public function getCart(): array
    {
        return Session::get('cart', []);
    }

    /**
     * Get cart total price
     * 
     * @return float
     */
    public function getCartTotal(): float
    {
        $cart = $this->getCart();
        $total = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return $total;
    }

    /**
     * Update cart item quantity
     * 
     * @param int $productId
     * @param int $quantity
     * @return bool
     */
    public function updateCartItem(int $productId, int $quantity): bool
    {
        $cart = Session::get('cart', []);

        if (isset($cart[$productId])) {
            if ($quantity <= 0) {
                return $this->removeFromCart($productId);
            }

            $cart[$productId]['quantity'] = $quantity;
            Session::put('cart', $cart);
            return true;
        }

        return false;
    }

    /**
     * Remove item from cart
     * 
     * @param int $productId
     * @return bool
     */
    public function removeFromCart(int $productId): bool
    {
        $cart = Session::get('cart', []);

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            Session::put('cart', $cart);
            return true;
        }

        return false;
    }

    /**
     * Clear entire cart
     * 
     * @return void
     */
    public function clearCart(): void
    {
        Session::forget('cart');
    }
}
