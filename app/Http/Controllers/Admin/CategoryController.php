<?php

namespace App\Http\Controllers\Admin;


use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCategoryRequest;
use App\Http\Requests\Admin\UpdateCategoryRequest;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        try {
            // Fetch paginated categories
            $categories = Category::orderBy('created_at', 'desc')->simplePaginate(5);
            return view('admin.categories.index', compact('categories'));
        } catch (\Exception $e) {
            Log::error('Error fetching categories: ' . $e->getMessage());
            return redirect()->route('admin.categories')->with('error', 'Failed to fetch categories.');
        }
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        // Access validated data
        $validatedData = $request->validated();

        // Create the category
        Category::create([
            'name' => $validatedData['name'],
            'slug' => Str::slug($validatedData['name']),
        ]);

        return redirect()->route('admin.categories')->with('success', 'Category created successfully.');
    }

    // Edit method remains unchanged
    public function edit($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        return view('admin.categories.edit', compact('category'));
    }

    // Update method uses UpdateCategoryRequest
    public function update(UpdateCategoryRequest $request)
    {
        // Access validated data
        $validatedData = $request->validated();

        // Find the category by ID passed in the request
        $category = Category::findOrFail($request->input('id'));

        // Update the category with the validated name
        $category->update([
            'name' => $validatedData['name'],
        ]);

        return redirect()->route('admin.categories')->with('success', 'Category updated successfully.');
    }

    public function delete($id)
    {
        try {
            // Fetch category and delete
            $category = Category::findOrFail($id);
            $category->delete();

            return redirect()->route('admin.categories')->with('success', 'Category deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Error deleting category: ' . $e->getMessage());
            return redirect()->route('admin.categories')->with('error', 'Failed to delete category.');
        }
    }
}
