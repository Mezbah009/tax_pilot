<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubCategoryController extends Controller
{
    // Show all subcategories
    public function index(Request $request)
    {
        $subcategories = SubCategory::with('category')->latest();

        if (!empty($request->get('keyword'))) {
            $subcategories = $subcategories->where('name', 'like', '%' . $request->get('keyword') . '%');
        }

        $subcategories = $subcategories->paginate(10);

        return view('admin.subcategories.index', compact('subcategories'));
    }



    // Show form to create a subcategory
    public function create()
    {
        $categories = Category::where('status', true)->get();
        return view('admin.subcategories.create', compact('categories'));
    }



    // Store new subcategory
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|exists:categories,id',
            'name' => 'required',
            'slug' => 'required|unique:sub_categories,slug',
        ]);

        if ($validator->passes()) {
            $subCategory = new SubCategory();
            $subCategory->category_id = $request->category_id;
            $subCategory->name = $request->name;
            $subCategory->slug = $request->slug;
            $subCategory->status = true; // default active
            $subCategory->save();

            $request->session()->flash('success', 'SubCategory added successfully');
            return response()->json([
                'status' => true,
                'message' => 'SubCategory added successfully'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    // Show edit form
    public function edit(SubCategory $subcategory)
    {
        $categories = Category::where('status', true)->get();
        return view('admin.subcategories.edit', compact('subcategory', 'categories'));
    }

    // Update subcategory
    public function update(Request $request, $id)
    {
        $subCategory = SubCategory::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'category_id' => 'required|exists:categories,id',
            'name' => 'required',
            'slug' => 'required|unique:sub_categories,slug,' . $subCategory->id,
        ]);

        if ($validator->passes()) {
            $subCategory->category_id = $request->category_id;
            $subCategory->name = $request->name;
            $subCategory->slug = $request->slug;
            $subCategory->save();

            $request->session()->flash('success', 'SubCategory updated successfully');
            return response()->json([
                'status' => true,
                'message' => 'SubCategory updated successfully'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }


    // Delete subcategory
    public function destroy(SubCategory $subcategory)
    {
        $subcategory->delete();
        return redirect()->route('subcategories.index')->with('success', 'SubCategory deleted successfully.');
    }

    // Toggle status (active/deactive)
    public function toggleStatus(SubCategory $subcategory)
    {
        $subcategory->status = !$subcategory->status;
        $subcategory->save();

        return redirect()->route('subcategories.index')->with('success', 'SubCategory status updated.');
    }


    public function getSubCategories(Request $request)
{
    $subcategories = SubCategory::where('category_id', $request->category_id)->get();

    return response()->json([
        'status' => true,
        'subCategories' => $subcategories
    ]);
}

}
