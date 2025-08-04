<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\HomeFirstSection;
use App\Models\TempImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class HomeFirstSectionController extends Controller
{
    public function index(Request $request)
    {
        $sections = HomeFirstSection::latest();
        if (!empty($request->get('keyword'))) {
            $sections = $sections->where('title', 'like', '%' . $request->get('keyword') . '%');
        }
        $sections = $sections->latest()->paginate(10);
        return view('admin.home_first_section.list', compact('sections'));
    }



    public function create()
    {
        return view('admin.home_first_section.create');
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
            'mission' => 'nullable|string',
            'vision' => 'nullable|string',
        ]);

        if ($validator->passes()) {
            $section = new HomeFirstSection();
            $section->title = $request->title;
            $section->description = $request->description;
            $section->button_name = $request->button_name;
            $section->link = $request->link;
            $section->mission = $request->mission;
            $section->vision = $request->vision;

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
            return redirect()->route('home_first_sections.index')->with('success', 'Section added successfully');
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }


    public function edit($id)
    {
        $section = HomeFirstSection::findOrFail($id);
        return view('admin.home_first_section.edit', compact('section'));
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
            'mission' => 'nullable|string',
            'vision' => 'nullable|string',
        ]);

        if ($validator->passes()) {
            $section = HomeFirstSection::findOrFail($id);
            $section->title = $request->title;
            $section->description = $request->description;
            $section->button_name = $request->button_name;
            $section->link = $request->link;
            $section->mission = $request->mission; // Update mission
            $section->vision = $request->vision; // Update vision

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

            return redirect()->route('home_first_sections.index')->with('success', 'Section updated successfully');
        } else {
            return back()->withErrors($validator)->withInput();
        }
    }


    public function destroy($id)
    {
        $section = HomeFirstSection::findOrFail($id);
        $section->delete();

        // Flash success message
        session()->flash('success', 'Section deleted successfully');

        // Return JSON response
        return response()->json([
            'status' => true,
            'message' => 'Section deleted successfully'
        ]);
    }





    //     public function store(Request $request)
    //     {
    //         // Validate the request data
    //         $validator = Validator::make($request->all(), [
    //             'title' => 'required|string',
    //             'description' => 'nullable|string',
    //             'button_name' => 'nullable|string',
    //             'link' => 'nullable|string',

    //         ]);

    //         if($validator->passes()){
    //             $section = new HomeFirstSection();
    //             $section->title = $request->title;
    //             $section->description = $request->description;
    //             $section->button_name = $request->button_name;
    //             $section->link = $request->link;
    //             $section->save();

    //         // Save image here

    //         if(!empty($request->image_id))
    //         {
    //             $tempImage = TempImage::find($request-> image_id);

    //             $extArray = explode('.',$tempImage->name);
    //             $ext = last($extArray);

    //             $newImageName= $section->id.'.'.$ext;
    //             $sPath =public_path().'/temp/'.$tempImage->name;
    //             $dPath =public_path().'/uploads/first_section/'.$newImageName;
    //             File::copy($sPath,$dPath);

    //             $section->image=$newImageName;
    //             $section->save();

    //         }

    //         // Save logo here

    //         if(!empty($request->image_id))
    //         {
    //             $tempImage = TempImage::find($request-> image_id);

    //             $extArray = explode('.',$tempImage->name);
    //             $ext = last($extArray);

    //             $newLogoName= $section->id.'.'.$ext;
    //             $sPath =public_path().'/temp/'.$tempImage->name;
    //             $dPath =public_path().'/uploads/first_section/'.$newLogoName ;
    //             File::copy($sPath,$dPath);

    //             $section->logo=$newLogoName ;
    //             $section->save();

    //         }


    //         $request->session()->flash('success','Section added successfully');
    //         return response()->json([
    //             'status'=>true,
    //             'messege'=>'Section added successfully'
    //         ]);

    //     }
    //     else{
    //         return response()->json([
    //             'status'=>false,
    //             'errors'=>$validator->errors()
    //         ]);
    //     }
    // }

}
