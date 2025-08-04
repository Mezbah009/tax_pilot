<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Leader;
use App\Models\Management;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ManagementController extends Controller
{
    public function index(Request $request)
    {
        $sections = Leader::latest();
        if(!empty($request->get('keyword'))){
            $sections = $sections->where('title','like','%'.$request->get('keyword').'%');
        }
        $sections = $sections->latest()->paginate(10);
        return view('admin.managements.list',compact('sections'));
    }

    public function create()
    {
        return view('admin.managements.create');
    }

    public function store(Request $request)
{
    // Validate the request data
    $validator = Validator::make($request->all(), [
        'name' => 'nullable|string',
        'designation' => 'nullable|string',
        'description' => 'nullable|string',
        'sub_description' => 'nullable|string', // Add sub_description validation
        'details' => 'nullable|string', // Add details validation
        'link' => 'nullable|string',
        'linkedin' => 'nullable|string',
        'facebook' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // If validation fails, redirect back with errors
    if ($validator->passes()) {
        $managements = new Leader();
        $managements->name = $request->name;
        $managements->designation = $request->designation;
        $managements->description = $request->description;
        $managements->sub_description = $request->sub_description; // Assign sub_description value
        $managements->details = $request->details; // Assign details value
        $managements->link = $request->link;
        $managements->linkedin = $request->linkedin;
        $managements->facebook = $request->facebook;
        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = 'image_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/first_section'), $imageName);
            $managements->image = $imageName;
        }
        // Save the management to the database
        $managements->save();

        // Redirect to index page
        return redirect()->route('managements.index')->with('success', 'Management Added successfully');
    } else {
        return back()->withErrors($validator)->withInput();
    }
}


    public function edit($id)
{
    // Find the Leader by id
    $section = Leader::findOrFail($id);

    // Return the view with the Leader data
    return view('admin.managements.edit', compact('section'));
}

public function update(Request $request, $id)
{
    // Validate the request data
    $validator = Validator::make($request->all(), [
        'name' => 'nullable|string',
        'designation' => 'nullable|string',
        'description' => 'nullable|string',
        'sub_description' => 'nullable|string', // Add sub_description validation
        'details' => 'nullable|string', // Add details validation
        'link' => 'nullable|string',
        'linkedin' => 'nullable|string',
        'facebook' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // If validation fails, redirect back with errors
    if ($validator->passes()) {
        // Find the leader by ID
        $leader = Leader::findOrFail($id);

        // Update leader properties
        $leader->name = $request->name;
        $leader->designation = $request->designation;
        $leader->description = $request->description;
        $leader->sub_description = $request->sub_description; // Assign sub_description value
        $leader->details = $request->details; // Assign details value
        $leader->link = $request->link;
        $leader->linkedin = $request->linkedin;
        $leader->facebook = $request->facebook;

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = 'image_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/first_section'), $imageName);
            $leader->image = $imageName;
        }

        // Save the leader to the database
        $leader->save();

        // Redirect to index page
        return redirect()->route('managements.index')->with('success', 'Management Updated successfully');
    } else {
        return back()->withErrors($validator)->withInput();
    }
}


public function destroy($id)
{
    $section = Leader::findOrFail($id);
    $section->delete();

    // Flash success message
    session()->flash('success', 'Management deleted successfully');

    // Return JSON response
    return response()->json([
        'status' => true,
        'message' => 'Management deleted successfully'
    ]);
}


}
