<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogAuthor;
use App\Models\BlogCategory;
use App\Models\BlogTag;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->with('author')->paginate(10);
        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        $authors = BlogAuthor::all();
        $categories = BlogCategory::all();
        $tags = BlogTag::all();

        return view('admin.blogs.create', compact('authors', 'categories', 'tags'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'author_id' => 'required|exists:blog_authors,id',
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string',
            'content' => 'required',
            'is_published' => 'nullable|boolean',
            'feature_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'category_ids' => 'nullable|array',
            'category_ids.*' => 'exists:blog_categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'exists:blog_tags,id',
            'published_at' => 'nullable|date',
        ]);

        DB::beginTransaction();

        try {
            // Create unique slug
            $slug = Str::slug($request->title);
            if (Blog::where('slug', $slug)->exists()) {
                $slug .= '-' . time();
            }

            $blog = new Blog();
            $blog->author_id = $request->author_id;
            $blog->title = $request->title;
            $blog->slug = $slug;
            $blog->excerpt = $request->excerpt;
            $blog->content = $request->content;
            $blog->is_published = $request->has('is_published') ? $request->boolean('is_published') : true;
            $blog->published_at = $request->has('is_published')
                ? ($request->filled('published_at') ? $request->published_at : now())
                : null;

            // Handle feature image
            if ($request->hasFile('feature_image')) {
                $file = $request->file('feature_image');
                $filename = Str::slug($request->title) . '-' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/blogs'), $filename);
                $blog->feature_image = $filename;
            }

            $blog->save();

            // Attach categories and tags
            if ($request->filled('category_ids')) {
                $blog->categories()->sync($request->category_ids);
            }

            if ($request->filled('tag_ids')) {
                $blog->tags()->sync($request->tag_ids);
            }

            DB::commit();

            return redirect()->route('blogs.index')->with('success', 'Blog created successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Something went wrong: ' . $e->getMessage()]);
        }
    }

    public function edit(Blog $blog)
    {
        $authors = BlogAuthor::all();
        $categories = BlogCategory::all();
        $tags = BlogTag::all();

        $selectedCategories = $blog->categories->pluck('id')->toArray();
        $selectedTags = $blog->tags->pluck('id')->toArray();

        return view('admin.blogs.edit', compact('blog', 'authors', 'categories', 'tags', 'selectedCategories', 'selectedTags'));
    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'author_id' => 'required|exists:blog_authors,id',
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string',
            'content' => 'required',
            'is_published' => 'nullable|boolean',
            'feature_image' => 'nullable|image|mimes:jpg,jpeg,png',
            'category_ids' => 'nullable|array',
            'tag_ids' => 'nullable|array',
            'published_at' => 'nullable|date',
        ]);

        $slug = Str::slug($request->title);
        if ($slug !== $blog->slug) {
            $slugCount = Blog::where('slug', $slug)->where('id', '!=', $blog->id)->count();
            if ($slugCount > 0) {
                $slug .= '-' . time();
            }
            $blog->slug = $slug;
        }

        $blog->author_id = $request->author_id;
        $blog->title = $request->title;
        $blog->excerpt = $request->excerpt;
        $blog->content = $request->content;
        $blog->is_published = $request->has('is_published');
        $blog->published_at = $blog->is_published
            ? ($request->filled('published_at') ? $request->published_at : now())
            : null;

        // Feature image
        if ($request->hasFile('feature_image')) {
            // Delete old if exists
            if ($blog->feature_image && File::exists(public_path('uploads/blogs/' . $blog->feature_image))) {
                File::delete(public_path('uploads/blogs/' . $blog->feature_image));
            }

            $file = $request->file('feature_image');
            $filename = Str::slug($blog->title) . '-' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/blogs'), $filename);
            $blog->feature_image = $filename;
        }

        $blog->save();

        // Sync categories and tags
        $blog->categories()->sync($request->category_ids ?? []);
        $blog->tags()->sync($request->tag_ids ?? []);

        return redirect()->route('blogs.index')->with('success', 'Blog updated successfully');
    }

    public function destroy(Blog $blog)
    {
        // Delete image
        if ($blog->feature_image && File::exists(public_path('uploads/blogs/' . $blog->feature_image))) {
            File::delete(public_path('uploads/blogs/' . $blog->feature_image));
        }

        $blog->delete();
        return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully');
    }



   public function indexBlog()

    {
        $comments = \App\Models\Comment::with(['blog', 'replies'])
            ->whereNull('parent_id') // only top-level comments
            ->latest()
            ->paginate(10);

        return view('admin.blogs.index-blog', compact('comments'));
    }
}
