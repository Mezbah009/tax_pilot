<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubSubCategoryController extends Controller
{
    public function index(Request $request)
    {
        $subsubcategories = SubSubCategory::with(['category', 'subcategory'])  // Load the relationships
            ->latest()  // Order by latest
            ->when($request->keyword, function ($query) use ($request) {  // Filter by search keyword
                return $query->where('name', 'like', '%' . $request->keyword . '%');
            })
            ->paginate(10);  // Paginate the results to 10 per page

        return view('admin.subsubcategories.index', compact('subsubcategories'));  // Pass the data to the view
    }



    public function create()
    {
        $categories = Category::all();
        // Initially passing empty subcategories as they will be loaded dynamically via AJAX
        $subcategories = [];
        return view('admin.subsubcategories.create', compact('categories', 'subcategories'));
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|exists:categories,id',
            'sub_category_id' => 'required|exists:sub_categories,id',
            'name' => 'required',
            'slug' => 'required|unique:sub_sub_categories',
        ]);

        if ($validator->passes()) {
            // Create new sub-sub-category
            $subSubCategory = new SubSubCategory();
            $subSubCategory->category_id = $request->category_id;
            $subSubCategory->sub_category_id = $request->sub_category_id;
            $subSubCategory->name = $request->name;
            $subSubCategory->slug = $request->slug;
            $subSubCategory->save();

            // Flash success message and return response
            $request->session()->flash('success', 'Sub-Sub-Category added successfully');
            return response()->json([
                'status' => true,
                'message' => 'Sub-Sub-Category added successfully',
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }
    }


    public function edit($id)
    {
        $subsubcategory = SubSubCategory::findOrFail($id);
        $categories = Category::all();
        $subcategories = SubCategory::where('category_id', $subsubcategory->category_id)->get();

        return view('admin.subsubcategories.edit', compact('subsubcategory', 'categories', 'subcategories'));
    }



    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|exists:categories,id',
            'sub_category_id' => 'required|exists:sub_categories,id',
            'name' => 'required',
            'slug' => 'required|unique:sub_sub_categories,slug,' . $id,
        ]);

        if ($validator->passes()) {
            // Find the sub-sub-category by ID
            $subSubCategory = SubSubCategory::findOrFail($id);

            // Update the fields
            $subSubCategory->category_id = $request->category_id;
            $subSubCategory->sub_category_id = $request->sub_category_id;
            $subSubCategory->name = $request->name;
            $subSubCategory->slug = $request->slug;
            $subSubCategory->save();

            // Flash success message and return response
            $request->session()->flash('success', 'Sub-Sub-Category updated successfully');
            return response()->json([
                'status' => true,
                'message' => 'Sub-Sub-Category updated successfully',
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }
    }


    public function destroy($id)
    {
        $subsubCategory = SubSubCategory::findOrFail($id);
        $subsubCategory->delete();

        return redirect()->route('subsubcategories.index')->with('success', 'SubSubCategory deleted successfully.');
    }

    public function toggleStatus($id)
    {
        $subsubCategory = SubSubCategory::findOrFail($id);
        $subsubCategory->status = !$subsubCategory->status;
        $subsubCategory->save();

        return redirect()->route('subsubcategories.index')->with('success', 'Status updated successfully.');
    }
}
