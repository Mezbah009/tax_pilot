<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BlogTag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogTagController extends Controller
{
    // Display a listing of tags
    public function index()
    {
        $blogTags = BlogTag::latest()->paginate(10);
        return view('admin.blog_tags.index', compact('blogTags'));
    }


    // Show the form for creating a new tag
    public function create()
    {
        return view('admin.blog_tags.create');
    }

    // Store a newly created tag in storage
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:blog_tags,name',
        ]);

        BlogTag::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->route('blog_tags.index')->with('success', 'Tag created successfully.');
    }

    // Show the form for editing the specified tag
    public function edit(BlogTag $blogTag)
    {
        return view('admin.blog_tags.edit', compact('blogTag'));
    }


    // Update the specified tag in storage
    public function update(Request $request, BlogTag $blog_tag)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:blog_tags,name,' . $blog_tag->id,
        ]);

        $blog_tag->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->route('blog_tags.index')->with('success', 'Tag updated successfully.');
    }

    // Remove the specified tag from storage
    public function destroy(BlogTag $blog_tag)
    {
        $blog_tag->delete();
        return redirect()->route('blog_tags.index')->with('success', 'Tag deleted successfully.');
    }
}
