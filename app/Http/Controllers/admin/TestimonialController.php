<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\TempImage;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class TestimonialController extends Controller
{
    public function index(Request $request)
    {
        $testimonials = Testimonial::latest();
        if(!empty($request->get('keyword'))){
            $testimonials = $testimonials->where('title','like','%'.$request->get('keyword').'%');
        }
        $testimonials = $testimonials->latest()->paginate(10);
        return view('admin.testimonials.list',compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'name' => 'nullable|string',
            'designation' => 'nullable|string',
            'description' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation rules for logo
        ]);

        if ($validator->passes()) {
            $testimonials = new Testimonial();
            $testimonials->name = $request->name;
            $testimonials->designation = $request->designation;
            $testimonials->description = $request->description;


            if (!empty($request->image_id)) {
                $tempImage = TempImage::find($request->image_id);

                $extArray = explode('.', $tempImage->name);
                $ext = last($extArray);
                $newImageName = uniqid() . '.' . $ext; // Generate a unique filename
                $sPath = public_path() . '/temp/' . $tempImage->name;
                $dPath = public_path() . '/uploads/testimonials/' . $newImageName;

                File::copy($sPath, $dPath);

                $testimonials->logo = $newImageName;
            }

            $testimonials->save();

            // Redirect to index page
            return redirect()->route('testimonials.index')->with('success', 'Testimonial added successfully');
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function edit($id)
    {
        $testimonials = Testimonial::findOrFail($id);
        return view('admin.testimonials.edit', compact('testimonials'));
    }


    public function update(Request $request, $id)
{
    // Validate the request data
    $validator = Validator::make($request->all(), [
        'name' => 'nullable|string',
        'designation' => 'nullable|string',
        'description' => 'nullable|string',
        'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation rules for logo
    ]);

    if ($validator->passes()) {
        $testimonials = Testimonial::findOrFail($id);
        $testimonials->name = $request->name;
        $testimonials->designation = $request->designation;
        $testimonials->description = $request->description;

        if (!empty($request->image_id)) {
            $tempImage = TempImage::find($request->image_id);

            $extArray = explode('.', $tempImage->name);
            $ext = last($extArray);
            $newImageName = $testimonials->id . '.' . $ext;
            $sPath = public_path() . '/temp/' . $tempImage->name;
            $dPath = public_path() . '/uploads/testimonials/' . $newImageName;

            File::copy($sPath, $dPath);

            $testimonials->logo = $newImageName;
            $testimonials->save();
        }

        $testimonials->save();

        // Redirect to index page
        return redirect()->route('testimonials.index')->with('success', 'Testimonial updated successfully');
    } else {
        return response()->json([
            'status' => false,
            'errors' => $validator->errors()
        ]);
    }
}


public function destroy($id)
{
    $clients = Testimonial::findOrFail($id);
    $clients->delete();

    // Flash success message
    session()->flash('success', 'Testimonial deleted successfully');

    // Return JSON response
    return response()->json([
        'status' => true,
        'message' => 'Testimonial deleted successfully'
    ]);
}
}
