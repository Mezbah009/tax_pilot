<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\TempImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index(Request $request)
    {
        $categories = Category::latest();
        if (!empty($request->get('keyword'))) {
            $categories =
                $categories->where('name', 'like', '%' . $request->get('keyword') . '%');
        }
        $categories = $categories->latest()->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required|unique:categories',
            'description' => 'nullable|string',
            'image_id' => 'nullable|exists:temp_images,id',
        ]);

        if ($validator->passes()) {
            $category = new Category();
            $category->name = $request->name;
            $category->slug = $request->slug;
            $category->description = $request->description;

            // Handle image upload from temp
            if (!empty($request->image_id)) {
                $tempImage = TempImage::find($request->image_id);
                if ($tempImage) {
                    $extArray = explode('.', $tempImage->name);
                    $ext = last($extArray);
                    $newImageName = uniqid() . '.' . $ext;

                    $sPath = public_path('/temp/' . $tempImage->name);
                    $dPath = public_path('/uploads/categories/' . $newImageName); // change path to categories

                    File::copy($sPath, $dPath);
                    $category->image = $newImageName;
                }
            }

            $category->save();

            $request->session()->flash('success', 'Category added successfully');
            return response()->json([
                'status' => true,
                'message' => 'Category added successfully'
            ]);
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
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required|unique:categories,slug,' . $category->id,
            'description' => 'nullable|string',
            'image_id' => 'nullable|exists:temp_images,id',
        ]);

        if ($validator->passes()) {
            $category->name = $request->name;
            $category->slug = $request->slug;
            $category->description = $request->description;

            // Handle image update
            if (!empty($request->image_id)) {
                $tempImage = TempImage::find($request->image_id);
                if ($tempImage) {
                    $extArray = explode('.', $tempImage->name);
                    $ext = last($extArray);
                    $newImageName = uniqid() . '.' . $ext;

                    $sPath = public_path('/temp/' . $tempImage->name);
                    $dPath = public_path('/uploads/categories/' . $newImageName);

                    File::copy($sPath, $dPath);

                    // Optionally delete the old image if it exists
                    if ($category->image && File::exists(public_path('/uploads/categories/' . $category->image))) {
                        File::delete(public_path('/uploads/categories/' . $category->image));
                    }

                    $category->image = $newImageName;
                }
            }
    
            $category->save();

            $request->session()->flash('success', 'Category updated successfully');
            return response()->json([
                'status' => true,
                'message' => 'Category updated successfully'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }


    public function toggleStatus(Category $category)
    {
        $category->status = !$category->status;
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category status updated successfully.');
    }
}
