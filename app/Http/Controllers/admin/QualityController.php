<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Quality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QualityController extends Controller
{
    public function index(Request $request)
    {
        $sections = Quality::latest();
        if(!empty($request->get('keyword'))){
            $sections = $sections->where('title','like','%'.$request->get('keyword').'%');
        }
        $sections = $sections->latest()->paginate(10);
        return view('admin.quality.list',compact('sections'));
    }

    public function create()
    {
        return view('admin.quality.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // If validation fails, redirect back with errors
        if ($validator->passes()) {
        $sections = new Quality();
        $sections->title = $request->title;
        $sections->description = $request->description;
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
        return redirect()->route('quality.index')->with('success', 'Quality create successfully');
    } else {
        return back()->withErrors($validator)->withInput();
    }
    }


    public function edit($id)
    {
        // Find the Leader by id
        $section = Quality::findOrFail($id);

        // Return the view with the Leader data
        return view('admin.quality.edit', compact('section'));
    }


    public function update(Request $request, $id)
{
    // Validate the request data
    $validator = Validator::make($request->all(), [
        'title' => 'nullable|string',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // If validation fails, redirect back with errors
    if ($validator->passes()) {
    // Find the Leader by id
    $sections = Quality::findOrFail($id);
    $sections->title = $request->title;
    $sections->description = $request->description;

    // Handle image upload
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = 'image_' . time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/first_section'), $imageName);
        $sections->image = $imageName;
    }

    // Save the management to the database
    $sections->save();

    return redirect()->route('quality.index')->with('success', 'Quality updated successfully');
    } else {
        return back()->withErrors($validator)->withInput();
    }
}


public function destroy($id)
{
    $section = Quality::findOrFail($id);
    $section->delete();

    // Flash success message
    session()->flash('success', 'Quality deleted successfully');

    // Return JSON response
    return response()->json([
        'status' => true,
        'message' => 'Quality deleted successfully'
    ]);
}
}
