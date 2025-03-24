<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductSearchRequest;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display the homepage
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('user.index');
    }

    /**
     * Show a specific product based on slug
     *
     * @param string $slug
     * @return \Illuminate\View\View
     */
    public function show($slug)
    {
        try {
            // Find the product by slug
            $product = Product::where('slug', $slug)->firstOrFail();

            // Return the view with the product data
            return view('user.show', compact('product'));
        } catch (\Exception $e) {
            // Log the error
            Log::error("Product not found for slug: $slug", ['error' => $e->getMessage()]);
            return redirect()->route('user.index')->with('error', 'Product not found.');
        }
    }

    /**
     * Show products under a specific category based on slug
     *
     * @param string $slug
     * @return \Illuminate\View\View
     */
    public function category($slug)
    {
        try {
            // Find the category by slug
            $category = Category::where('slug', $slug)->firstOrFail();

            // Return the view with the category data
            return view('user.category', compact('category'));
        } catch (\Exception $e) {
            // Log the error
            Log::error("Category not found for slug: $slug", ['error' => $e->getMessage()]);
            return redirect()->route('user.index')->with('error', 'Category not found.');
        }
    }

    /**
     * Handle product search
     *
     * @param ProductSearchRequest $request
     * @return \Illuminate\View\View
     */
    public function search(ProductSearchRequest $request)
    {
        try {
            // Get the search query from the request
            $query = $request->input('query');

            // Optionally, add logic to search products using the query
            $products = Product::where('name', 'like', "%$query%")->get();

            // Return the view with the search results
            return view('user.search', compact('products', 'query'));
        } catch (\Exception $e) {
            // Log the error
            Log::error("Search error", ['error' => $e->getMessage()]);
            return redirect()->route('user.index')->with('error', 'Something went wrong with the search.');
        }
    }

    /**
     * Show all products
     *
     * @return \Illuminate\View\View
     */
    public function showAll()
    {
        try {
            // Optionally, get all products
            $products = Product::all();

            return view('user.showAll', compact('products'));
        } catch (\Exception $e) {
            // Log the error
            Log::error("Error fetching all products", ['error' => $e->getMessage()]);
            return redirect()->route('user.index')->with('error', 'Could not fetch products.');
        }
    }
}
