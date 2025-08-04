<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\HomeAboutSection;
use App\Models\TempImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class HomeAboutSectionController extends Controller
{




    public function index(Request $request)
    {
        $sections = HomeAboutSection::latest();
        if (!empty($request->get('keyword'))) {
            $sections = $sections->where('title', 'like', '%' . $request->get('keyword') . '%');
        }
        $sections = $sections->latest()->paginate(10);
        return view('admin.home_about_section.index', compact('sections'));
    }



    public function create()
    {
        return view('admin.home_about_section.create');
    }



    public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'heading' => 'nullable|string|max:255',
        'subheading' => 'nullable|string|max:255',
        'description' => 'nullable|string',
        'image' => 'nullable|integer|exists:temp_images,id', // ✅ Fixed
        'brochure' => 'nullable|mimes:pdf|max:10240',
    ]);

    if ($validator->passes()) {
        $section = new HomeAboutSection();
        $section->heading = $request->heading;
        $section->subheading = $request->subheading;
        $section->description = $request->description;

        // ✅ Handle image from temp
        if (!empty($request->image)) {
            $tempImage = TempImage::find($request->image);
            $ext = pathinfo($tempImage->name, PATHINFO_EXTENSION);
            $newImageName = uniqid() . '.' . $ext;
            $source = public_path('/temp/' . $tempImage->name);
            $destination = public_path('/uploads/images/' . $newImageName);
            File::copy($source, $destination);
            $section->image = $newImageName;
        }

        // ✅ Handle brochure upload
        if ($request->hasFile('brochure')) {
            $brochure = $request->file('brochure');
            $brochureName = 'brochure_' . uniqid() . '.' . $brochure->getClientOriginalExtension();
            $brochure->move(public_path('uploads/brochures'), $brochureName);
            $section->brochure = $brochureName;
        }

        $section->save();

        return redirect()->route('home-about.index')->with('success', 'About section saved successfully.');
    } else {
        return response()->json([
            'status' => false,
            'errors' => $validator->errors()
        ]);
    }
}

}
