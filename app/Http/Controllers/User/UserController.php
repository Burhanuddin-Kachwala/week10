<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProductSearchRequest;

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

    //show all user details
    public function showDetails()
    {
        $user = Auth::user();
        // Use the with() method directly to eager load the relationships
        $user = User::with(['addresses', 'orders.items'])->find(Auth::id());

        return view('user.showDetail', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
        ]);

        $user = Auth::user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'User updated successfully'
        ]);
    }

    public function updateAddress(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'address_line_1' => 'required|string|max:255',
            'address_line_2' => 'nullable|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'postal_code' => 'required|string|max:20',
        ]);

        // Get the authenticated user
        $user = Auth::user();

        // Retrieve the user's first address (or create one if not exists)
        $address = $user->addresses()->first(); // Assuming a user can have multiple addresses, this fetches the first one.

        // If the user doesn't have an address, create a new one
        if (!$address) {
            $address = new Address();
        }

        // Update the address fields
        $address->address_line_1 = $request->input('address_line_1');
        $address->address_line_2 = $request->input('address_line_2');
        $address->city = $request->input('city');
        $address->state = $request->input('state');
        $address->postal_code = $request->input('postal_code');

        // Save the updated address
        $user->addresses()->save($address);

        // Return a success response
        return response()->json([
            'success' => true,
            'message' => 'Address updated successfully'
        ]);
    }
}
