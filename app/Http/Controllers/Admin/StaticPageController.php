<?php

namespace App\Http\Controllers\Admin;

use App\Models\StaticPage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StaticPageRequest;
use App\Http\Requests\Admin\StoreStaticPageRequest;

class StaticPageController extends Controller
{
    public function index()
    {
        // Paginate the StaticPage results, you can adjust the number of items per page
        $staticPages = StaticPage::latest()->paginate(10); // 10 items per page

        return view('admin.static-pages.index', compact('staticPages'));
    }

    public function create()
    {
        return view('admin.static-pages.create');
    }
    public function store(StoreStaticPageRequest $request)
    {
        // Automatically generate slug and set status as active by default
        $validated = $request->validated();
        $validated['slug'] = Str::slug($validated['title']);
        $validated['status'] = 'active'; // Default status is active

        // Create static page record
        StaticPage::create($validated);

        return redirect()->route('admin.static-pages.index')->with('success', 'Page created successfully!');
    }
    public function edit(StaticPage $staticPage)
    {
        return view('admin.static-pages.edit', compact('staticPage'));
    }

    public function update(StaticPageRequest $request, StaticPage $staticPage)
    {
        // Generate the slug from the title
        $slug = Str::slug($request->title);

       
        // Update the StaticPage based on the validated data
        $staticPage->update([
            'title' => $request->title,
            'slug' => $slug,  
            'status' => $request->status,
            'content' => $request->content,  
        ]);

        // Redirect back with success message
        return redirect()->route('admin.static-pages.index')->with('success', 'Page updated successfully!');
    }
    public function delete(Request $request)
    {
        
        // Retrieve the ID from the request
        $staticPage = StaticPage::findOrFail($request->id);

        // Delete the static page
        $staticPage->delete();

        // Redirect with success message
        return redirect()->route('admin.static-pages.index')
            ->with('success', 'Static Page deleted successfully.');
    }


    // public function uploadImage(Request $request)
    // {
    //     // Validate the incoming image
    //     $request->validate([
    //         'file' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
    //     ]);

    //     // Store the image in the 'public' disk and generate a URL
    //     $imagePath = $request->file('file')->store('images', 'public');

    //     // Return the image URL so Froala can insert it into the editor
    //     return response()->json(['link' => Storage::url($imagePath)]);
    // }
}
