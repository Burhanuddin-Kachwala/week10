<?php

namespace App\Http\Controllers\Admin;

use App\Models\Author;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreAuthorRequest;
use App\Http\Requests\Admin\UpdateAuthorRequest;

class AuthorController extends Controller
{
    public function index()
    {
        try {
            $authors = Author::orderBy('created_at', 'desc')->simplePaginate(5);
            return view('admin.authors.index', compact('authors'));
        } catch (\Exception $e) {
            Log::error('Error fetching authors: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to load authors.');
        }
    }

    public function create()
    {
        return view('admin.authors.create');
    }

    public function store(StoreAuthorRequest $request)
    {
        try {
            // Handle Image Upload
            $imagePath = null;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $imagePath = $image->storeAs('images', $imageName, 'public');
            }

            // Create Author
            Author::create([
                'name' => $request->input('name'),
                'bio' => $request->input('bio'),
                'slug' => Str::slug($request->input('name')),
                'image' => $imagePath ? 'storage/' . $imagePath : null,
            ]);

            return redirect()->route('admin.authors')->with('success', 'Author created successfully.');
        } catch (\Exception $e) {
            Log::error('Error creating author: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while creating the author.');
        }
    }

    public function edit($slug)
    {
        try {
            $author = Author::where('slug', $slug)->firstOrFail();
            return view('admin.authors.edit', compact('author'));
        } catch (\Exception $e) {
            Log::error('Error finding author for edit: ' . $e->getMessage());
            return redirect()->route('admin.authors')->with('error', 'Author not found.');
        }
    }

    public function update(UpdateAuthorRequest $request)
    {
        try {
            $author = Author::findOrFail($request->input('id'));

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $imagePath = $image->storeAs('images', $imageName, 'public');
                $author->image = 'storage/' . $imagePath;
            }

            $author->update([
                'name' => $request->input('name'),
                'bio' => $request->input('bio'),
                'slug' => Str::slug($request->input('name')),
            ]);

            return redirect()->route('admin.authors')->with('success', 'Author updated successfully.');
        } catch (\Exception $e) {
            Log::error('Error updating author: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while updating the author.');
        }
    }

    public function delete($id)
    {
        try {
            $author = Author::findOrFail($id);
            $author->delete();

            return redirect()->route('admin.authors')->with('success', 'Author deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Error deleting author: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while deleting the author.');
        }
    }
}
