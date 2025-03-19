<?php

namespace App\Http\Controllers\Admin;

use App\Models\Author;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

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
        // Fetch all categories from the database
        $categories = Category::all();
        $authors = Author::all();
       

        // Return a view and pass the categories data to it
        return view('admin.products.create', compact('categories','authors'));
    }

    public function store(Request $request)
    {
        $imagePath = null;
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category' => 'required|exists:categories,id',
            'quantity' => 'required|integer|min:1',
            'author' => 'required|exists:authors,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
           
        ]);

        // Handle the image upload
        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName(); // Create a unique name for the image
            $imagePath = $image->storeAs('images', $imageName, 'public');  // Store the image in public/images folder
           
            
        } 
        
        // Create a new product with the validated data
        $val = Product::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'quantity' => $request->input('quantity'),
            'slug' => Str::slug($request->input('name')),
            'category_id' => $request->input('category'),
            'author_id' => $request->input('author'),
            'image' =>  'storage/' . $imagePath , // Store the image path with 'storage' prefix
            'quantity' => $request->input('quantity'),
        ]);
       

        // Redirect to the products index with a success message
        return redirect()->route('admin.products')->with('success', 'Product created successfully.');
    }

    public function edit($slug)
    {
        return view('admin.products.edit', [
            'product' => Product::where('slug', $slug)->firstOrFail(),
            'categories' => Category::all(),
            'authors' => Author::all()
        ]);
    }
    public function update(Request $request){
        $request->validate([
            'id' => 'required|exists:products,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category' => 'required|exists:categories,id',
            'quantity' => 'required|integer|min:1',
            'author' => 'required|exists:authors,id',
            'status' => 'required|in:active,inactive',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Find the product by ID
        $product = Product::findOrFail($request->input('id'));

        // Handle the image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName(); // Create a unique name for the image
            $imagePath = $image->storeAs('images', $imageName, 'public');  // Store the image in public/images folder
            $product->image = 'storage/' . $imagePath; // Update the image path
        }

        // Update the product with the validated data
        $product->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'quantity' => $request->input('quantity'),
            'slug' => Str::slug($request->input('name')),
            'category_id' => $request->input('category'),
            'author_id' => $request->input('author'),
            'status' => $request->input('status'),
        ]);

        // Redirect to the products index with a success message
        return redirect()->route('admin.products')->with('success', 'Product updated successfully.');


    }

    public function delete($id)
    {
        // Find the product by ID
        $product = Product::findOrFail($id);

        // Delete the product
        $product->delete();

        // Redirect to the products index with a success message
        return redirect()->route('admin.products')->with('success', 'Product Deleted successfully.');
    }
}
