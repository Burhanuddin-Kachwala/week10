<?php

namespace App\Http\Controllers\Admin;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::orderBy('created_at', 'desc')->simplePaginate(5);
        return view('admin.authors.index', compact('authors'));
    }

    public function create()
    {
        return view('admin.authors.create');
    }

    public function store(Request $request)
    {
       
        $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('images', $imageName, 'public');
        }

        Author::create([
            'name' => $request->input('name'),
            'bio' => $request->input('bio'),
            'slug' => Str::slug($request->input('name')),
            'image' => $imagePath ? 'storage/' . $imagePath : null,
        ]);

        return redirect()->route('admin.authors')->with('success', 'Author created successfully.');
    }

    public function edit($slug)
    {
        $author = Author::where('slug', $slug)->firstOrFail();
        return view('admin.authors.edit', compact('author'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:authors,id',
            'name' => 'required|string|max:255',
            'bio' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

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
    }

    public function delete($id)
    {
        $author = Author::findOrFail($id);
        $author->delete();

        return redirect()->route('admin.authors')->with('success', 'Author deleted successfully.');
    }
}
