<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ClientCategory;
use App\Models\TempImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ClientCategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = ClientCategory::latest();
        if (!empty($request->get('keyword'))) {
            $categories =
                $categories->where('name', 'like', '%' . $request->get('keyword') . '%');
        }
        $categories = $categories->latest()->paginate(10);
        return view('admin.client_categories.index', compact('categories'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.client_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required|unique:client_categories',
        ]);

        if ($validator->passes()) {
            $clientCategory = new ClientCategory();
            $clientCategory->name = $request->name;
            $clientCategory->slug = $request->slug;
            $clientCategory->status = $request->has('status') ? 1 : 0;
            $clientCategory->save();

            $request->session()->flash('success', 'Client Category added successfully');
            return response()->json([
                'status' => true,
                'message' => 'Client Category added successfully'
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
    public function edit($id)
    {
        $clientCategory = ClientCategory::findOrFail($id);
        return view('admin.client_categories.edit', compact('clientCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $clientCategory = ClientCategory::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required|unique:client_categories,slug,' . $clientCategory->id,
        ]);

        if ($validator->passes()) {
            // Update the category's data
            $clientCategory->name = $request->name;
            $clientCategory->slug = $request->slug;
            $clientCategory->status = $request->has('status') ? 1 : 0;

            $clientCategory->save();

            // Flash success message to session
            $request->session()->flash('success', 'Client Category updated successfully');

            // Return JSON response
            return response()->json([
                'status' => true,
                'message' => 'Client Category updated successfully'
            ]);
        } else {
            // Return validation errors if the validation fails
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClientCategory $clientCategory)
    {
        $clientCategory->delete();
        return redirect()->route('client_categories.index')->with('success', 'client categories deleted successfully.');
    }


    public function toggleStatus(ClientCategory $clientCategory)
    {
        $clientCategory->status = !$clientCategory->status;
        $clientCategory->save();

        return redirect()->route('client_categories.index')->with('success', 'client categories status updated successfully.');
    }
}
