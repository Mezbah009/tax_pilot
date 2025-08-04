<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Award;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AwardController extends Controller
{
    public function index(Request $request)
    {
        $sections = Award::latest();
        if(!empty($request->get('keyword'))){
            $sections = $sections->where('title','like','%'.$request->get('keyword').'%');
        }
        $sections = $sections->latest()->paginate(10);
        return view('admin.awards.list',compact('sections'));
    }

    public function create()
    {
        return view('admin.awards.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // If validation fails, redirect back with errors
        if ($validator->passes()) {
        $sections = new Award();
        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = 'image_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/first_section'), $imageName);
            $sections->image = $imageName;
        }
        // Save the management to the database
        // dd($managements);
        $sections->save();


        // Redirect to index page
        return redirect()->route('awards.index')->with('success', 'Award create successfully');
    } else {
        return back()->withErrors($validator)->withInput();
    }
    }


    public function edit($id)
    {
        // Find the Leader by id
        $section = Award::findOrFail($id);

        // Return the view with the Leader data
        return view('admin.awards.edit', compact('section'));
    }


    public function update(Request $request, $id)
{
    // Validate the request data
    $validator = Validator::make($request->all(), [
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // If validation fails, redirect back with errors
    if ($validator->passes()) {
    // Find the Leader by id
    $sections = Award::findOrFail($id);
    // Handle image upload
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = 'image_' . time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/first_section'), $imageName);
        $sections->image = $imageName;
    }

    // Save the management to the database
    $sections->save();

    return redirect()->route('awards.index')->with('success', 'Award updated successfully');
    } else {
        return back()->withErrors($validator)->withInput();
    }
}


public function destroy($id)
{
    $section = Award::findOrFail($id);
    $section->delete();

    // Flash success message
    session()->flash('success', 'Award deleted successfully');

    // Return JSON response
    return response()->json([
        'status' => true,
        'message' => 'Award deleted successfully'
    ]);
}
}
