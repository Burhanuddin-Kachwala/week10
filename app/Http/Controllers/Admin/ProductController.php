<?php

namespace App\Http\Controllers\Admin;

use App\Models\Author;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Http\Requests\Admin\StoreProductRequest;
use App\Http\Requests\Admin\UpdateProductRequest;
use Illuminate\Support\Facades\Log;
use Exception;
class ProductController extends Controller
{
    public function index()
    {
        // Fetch paginated products from the database
        $products = Product::with('category')->orderBy('created_at', 'desc')->simplePaginate(5);

        // Return a view and pass the products data to it
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        // Fetch all categories and authors from the database
        $categories = Category::all();
        $authors = Author::all();

        // Return a view and pass the categories and authors data to it
        return view('admin.products.create', compact('categories', 'authors'));
    }

    public function store(StoreProductRequest $request)
    {
        $imagePath = null;

        try {
            // Handle the image upload
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName(); // Create a unique name for the image
                $imagePath = $image->storeAs('images', $imageName, 'public');  // Store the image in public/images folder
            }

            // Get validated data from the request
            $validatedData = $request->validated();

            // Create a new product with the validated data
            Product::create([
                'name' => $validatedData['name'],
                'description' => $validatedData['description'],
                'price' => $validatedData['price'],
                'quantity' => $validatedData['quantity'],
                'slug' => Str::slug($validatedData['name']),
                'category_id' => $validatedData['category'],
                'author_id' => $validatedData['author'],
                'image' => 'storage/' . $imagePath, // Store the image path with 'storage' prefix
            ]);

            return redirect()->route('admin.products')->with('success', 'Product created successfully.');
        } catch (Exception $e) {
            Log::error('Error creating product: ' . $e->getMessage());
            return redirect()->route('admin.products.create')->with('error', 'Failed to create product.');
        }
    }

    public function edit($slug)
    {
        return view('admin.products.edit', [
            'product' => Product::where('slug', $slug)->firstOrFail(),
            'categories' => Category::all(),
            'authors' => Author::all()
        ]);
    }

    public function update(UpdateProductRequest $request)
    {
        try {
            // Get validated data from the request
            $validatedData = $request->validated();

            // Find the product by ID
            $product = Product::findOrFail($validatedData['id']);

            // Handle the image upload
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName(); // Create a unique name for the image
                $imagePath = $image->storeAs('images', $imageName, 'public');  // Store the image in public/images folder
                $product->image = 'storage/' . $imagePath; // Update the image path
            }

            // Update the product with the validated data
            $product->update([
                'name' => $validatedData['name'],
                'description' => $validatedData['description'],
                'price' => $validatedData['price'],
                'quantity' => $validatedData['quantity'],
                'slug' => Str::slug($validatedData['name']),
                'category_id' => $validatedData['category'],
                'author_id' => $validatedData['author'],
                'status' => $validatedData['status'],
            ]);

            return redirect()->route('admin.products')->with('success', 'Product updated successfully.');
        } catch (Exception $e) {
            Log::error('Error updating product: ' . $e->getMessage());
            return redirect()->route('admin.products.edit', ['slug' => $validatedData['slug']])
                ->with('error', 'Failed to update product.');
        }
    }

    public function delete($id)
    {
        try {
            // Find the product by ID
            $product = Product::findOrFail($id);

            // Delete the product
            $product->delete();

            // Redirect to the products index with a success message
            return redirect()->route('admin.products')->with('success', 'Product deleted successfully.');
        } catch (Exception $e) {
            Log::error('Error deleting product: ' . $e->getMessage());
            return redirect()->route('admin.products')->with('error', 'Failed to delete product.');
        }
    }
   
}
