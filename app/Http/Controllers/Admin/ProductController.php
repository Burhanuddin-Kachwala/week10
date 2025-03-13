<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // Fetch paginated products from the database
        $products = Product::paginate(10);
           
        // Return a view and pass the products data to it
        return view('admin.products.index', compact('products'));
    }
    public function edit($id)
    {
        // Dump and die the product ID
        dd('Edit product with ID: ' . $id);
    }

    public function delete($id)
    {
        // Dump and die the product ID
        dd('Delete product with ID: ' . $id);
    }
}
