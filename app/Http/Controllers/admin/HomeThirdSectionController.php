<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\HomeThirdSection;
use App\Models\TempImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class HomeThirdSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sections = HomeThirdSection::query()->latest();

        if (!empty($request->get('keyword'))) {
            $sections->where('title', 'like', '%' . $request->get('keyword') . '%');
        }

        $sections = $sections->paginate(10);
        return view('admin.home_third_sections.index', compact('sections'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.home_third_sections.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'link' => 'nullable|string',
        ]);

        if ($validator->passes()) {
            $section = new HomeThirdSection();
            $section->title = $request->title;
            $section->description = $request->description;
            $section->link = $request->link;

            // Handle main image
            if (!empty($request->image_id)) {
                $tempImage = TempImage::find($request->image_id);
                $extArray = explode('.', $tempImage->name);
                $ext = last($extArray);
                $newImageName = uniqid() . '.' . $ext;
                $sPath = public_path('/temp/' . $tempImage->name);
                $dPath = public_path('/uploads/home_third_sections/' . $newImageName);
                File::copy($sPath, $dPath);
                $section->image = $newImageName;
            }

            // Handle logo image (optional)
            if (!empty($request->logo_id)) {
                $tempLogo = TempImage::find($request->logo_id);
                $extArray = explode('.', $tempLogo->name);
                $ext = last($extArray);
                $newLogoName = uniqid() . '.' . $ext;
                $sPath = public_path('/temp/' . $tempLogo->name);
                $dPath = public_path('/uploads/home_third_sections/' . $newLogoName);
                File::copy($sPath, $dPath);
                $section->logo = $newLogoName;
            }

            $section->save();

            return redirect()->route('home-third-sections.index')->with('success', 'Section added successfully');
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
        $section = HomeThirdSection::findOrFail($id);
        return view('admin.home_third_sections.edit', compact('section'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'link' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }

        $section = HomeThirdSection::findOrFail($id);
        $section->title = $request->title;
        $section->description = $request->description;
        $section->link = $request->link;

        // Handle main image update
        if (!empty($request->image_id)) {
            $tempImage = TempImage::find($request->image_id);
            if ($tempImage) {
                $extArray = explode('.', $tempImage->name);
                $ext = last($extArray);
                $newImageName = uniqid() . '.' . $ext;

                $sourcePath = public_path('/temp/' . $tempImage->name);
                $destinationPath = public_path('/uploads/home_third_sections/' . $newImageName);
                File::copy($sourcePath, $destinationPath);

                // Delete old image if exists
                if ($section->image && File::exists(public_path('/uploads/home_third_sections/' . $section->image))) {
                    File::delete(public_path('/uploads/home_third_sections/' . $section->image));
                }

                $section->image = $newImageName;
            }
        }

        // Handle logo image update
        if (!empty($request->logo_id)) {
            $tempLogo = TempImage::find($request->logo_id);
            if ($tempLogo) {
                $extArray = explode('.', $tempLogo->name);
                $ext = last($extArray);
                $newLogoName = uniqid() . '.' . $ext;

                $sourcePath = public_path('/temp/' . $tempLogo->name);
                $destinationPath = public_path('/uploads/home_third_sections/' . $newLogoName);
                File::copy($sourcePath, $destinationPath);

                // Delete old logo if exists
                if ($section->logo && File::exists(public_path('/uploads/home_third_sections/' . $section->logo))) {
                    File::delete(public_path('/uploads/home_third_sections/' . $section->logo));
                }

                $section->logo = $newLogoName;
            }
        }

        $section->save();

        return redirect()->route('home-third-sections.index')->with('success', 'Section updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $section = HomeThirdSection::find($id);

        if (!$section) {
            return response()->json([
                'status' => false,
                'message' => 'Section not found.'
            ], 404);
        }

        // Optional: delete associated image and logo files
        if ($section->image && file_exists(public_path('uploads/home_third_sections/' . $section->image))) {
            unlink(public_path('uploads/home_third_sections/' . $section->image));
        }

        if ($section->logo && file_exists(public_path('uploads/home_third_sections/' . $section->logo))) {
            unlink(public_path('uploads/home_third_sections/' . $section->logo));
        }

        $section->delete();

        // Flash success message
        session()->flash('success', 'Section deleted successfully');

        return response()->json([
            'status' => true,
            'message' => 'Section deleted successfully.'
        ]);
    }
}
