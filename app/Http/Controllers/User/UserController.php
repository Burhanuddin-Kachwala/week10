<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
       
    }

    public function show($slug)
    {
        // Logic for showing a specific user
        // Find the product by slug
        $product = Product::where('slug', $slug)->firstOrFail();

        // Return the view with the product data
        return view('user.show', compact('product'));
    }

    public function edit($id)
    {
        return view('user.edit');
    }

    public function update(Request $request, $id)
    {
        // Logic for updating a specific user
    }

    public function destroy($id)
    {
        // Logic for deleting a specific user
    }
}
