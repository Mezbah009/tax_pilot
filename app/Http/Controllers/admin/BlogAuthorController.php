<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\TempImage;
use App\Models\BlogAuthor;
use Illuminate\Support\Facades\Validator;

class BlogAuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = BlogAuthor::latest()->paginate(10);
        return view('admin.blog_authors.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog_authors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:blog_authors,email',
            'bio' => 'nullable|string',
            'image_id' => 'nullable|exists:temp_images,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }

        $author = new BlogAuthor();
        $author->name = $request->name;
        $author->email = $request->email;
        $author->bio = $request->bio;
        $author->save(); // Save first to get the ID

        // Handle profile image upload
        if (!empty($request->image_id)) {
            $tempImage = TempImage::find($request->image_id);

            if ($tempImage) {
                $extArray = explode('.', $tempImage->name);
                $ext = last($extArray);

                // Format: authorname-id.extension
                $safeName = Str::slug($author->name); // Safe name for filename
                $newImageName = $safeName . '-' . $author->id . '.' . $ext;

                $sPath = public_path('temp/' . $tempImage->name);
                $dPath = public_path('uploads/authors/' . $newImageName);

                if (File::exists($sPath)) {
                    File::copy($sPath, $dPath);
                    $author->profile_image = $newImageName;
                    $author->save(); // Update with profile image
                }
            }

            return redirect()->route('blog_authors.index')->with('success', 'Author added successfully');
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $author = BlogAuthor::find($id);

        if (!$author) {
            return redirect()->route('blog_authors.index')->with('error', 'Author not found.');
        }

        return view('admin.blog_authors.edit', compact('author'));
    }


    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, $id)
{
    $author = BlogAuthor::find($id);

    if (!$author) {
        return redirect()->route('blog_authors.index')->with('error', 'Author not found.');
    }

    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'nullable|email|unique:blog_authors,email,' . $author->id,
        'bio' => 'nullable|string',
        'image_id' => 'nullable|exists:temp_images,id',
    ]);

    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput();
    }

    $author->name = $request->name;
    $author->email = $request->email;
    $author->bio = $request->bio;
    $author->save();

    // Handle new profile image (optional)
    if (!empty($request->image_id)) {
        $tempImage = TempImage::find($request->image_id);

        if ($tempImage) {
            $extArray = explode('.', $tempImage->name);
            $ext = last($extArray);

            $safeName = Str::slug($author->name);
            $newImageName = $safeName . '-' . $author->id . '.' . $ext;

            $sPath = public_path('temp/' . $tempImage->name);
            $dPath = public_path('uploads/authors/' . $newImageName);

            if (File::exists($sPath)) {
                // Delete old image
                if (!empty($author->profile_image) && File::exists(public_path('uploads/authors/' . $author->profile_image))) {
                    File::delete(public_path('uploads/authors/' . $author->profile_image));
                }

                File::copy($sPath, $dPath);
                $author->profile_image = $newImageName;
                $author->save(); // Update with new image
            }
        }
    }

    return redirect()->route('blog_authors.index')->with('success', 'Author updated successfully.');
}


    /**
     * Remove the specified resource from storage.
     */

    public function destroy($id)
    {
        $author = BlogAuthor::find($id);

        if (!$author) {
            return response()->json([
                'status' => false,
                'message' => 'Author not found.'
            ], 404);
        }

        // Optional: delete profile image
        if ($author->profile_image && file_exists(public_path('uploads/authors/' . $author->profile_image))) {
            unlink(public_path('uploads/authors/' . $author->profile_image));
        }

        $author->delete();

        // Flash success message
        session()->flash('success', 'Author deleted successfully');

        return response()->json([
            'status' => true,
            'message' => 'Author deleted successfully.'
        ]);
    }
}
