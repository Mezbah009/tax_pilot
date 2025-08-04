<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\HomeSecondSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeSecondSectionController extends Controller
{
    public function index(Request $request)
    {
        $sections = HomeSecondSection::latest();
        if(!empty($request->get('keyword'))){
            $sections = $sections->where('title','like','%'.$request->get('keyword').'%');
        }
        $sections = $sections->latest()->paginate(10);
        return view('admin.home_second_section.list',compact('sections'));
    }

    public function create()
    {
        return view('admin.home_second_section.create');
    }


    public function store(Request $request)
{
    // Validate the request data
    $validator = Validator::make($request->all(), [
        'title' => 'required|string',
        'description' => 'nullable|string',
        'button_name' => 'nullable|string',
        'link' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation rules for image
        'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation rules for logo
    ]);

    if ($validator->passes()) {
        $section = new HomeSecondSection();
        $section->title = $request->title;
        $section->description = $request->description;
        $section->button_name = $request->button_name;
        $section->link = $request->link;

        // Save image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = 'image_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/first_section'), $imageName);
            $section->image = $imageName;
        }

        // Save logo
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = 'logo_' . time() . '.' . $logo->getClientOriginalExtension();
            $logo->move(public_path('uploads/first_section'), $logoName);
            $section->logo = $logoName;
        }

        $section->save();

        // Redirect to index page
        return redirect()->route('home_second_sections.index')->with('success', 'Section added successfully');
    } else {
        return response()->json([
            'status' => false,
            'errors' => $validator->errors()
        ]);
    }
}


public function edit($id)
{
    $section = HomeSecondSection::findOrFail($id);
    return view('admin.home_second_section.edit', compact('section'));
}


public function update(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'title' => 'required|string',
        'description' => 'nullable|string',
        'button_name' => 'nullable|string',
        'link' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation rules for image
        'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation rules for logo
    ]);

    if ($validator->passes()) {
        $section = HomeSecondSection::findOrFail($id);
        $section->title = $request->title;
        $section->description = $request->description;
        $section->button_name = $request->button_name;
        $section->link = $request->link;

        // Update image if provided
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = 'image_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/first_section'), $imageName);
            $section->image = $imageName;
        }

        // Update logo if provided
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = 'logo_' . time() . '.' . $logo->getClientOriginalExtension();
            $logo->move(public_path('uploads/first_section'), $logoName);
            $section->logo = $logoName;
        }

        $section->save();

        return redirect()->route('home_second_sections.index')->with('success', 'Section updated successfully');
    } else {
        return back()->withErrors($validator)->withInput();
    }
}


public function destroy($id)
{
    $section = HomeSecondSection::findOrFail($id);
    $section->delete();

    // Flash success message
    session()->flash('success', 'Section deleted successfully');

    // Return JSON response
    return response()->json([
        'status' => true,
        'message' => 'Section deleted successfully'
    ]);
}


}
