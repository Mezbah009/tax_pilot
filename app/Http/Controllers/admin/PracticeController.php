<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Practice;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class PracticeController extends Controller
{


    public function index()
    {
        $practices = Practice::latest()->paginate(10); // or ->get() if you don’t want pagination

        return view('admin.practices.index', compact('practices'));
    }

    /**
     * Show the form to create a new practice.
     */
    public function create()
    {
        return view('admin.practices.create'); // Create a Blade view at resources/views/practices/create.blade.php
    }

    /**
     * Store a newly created practice in the database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string',
            'description' => 'nullable|string',
            'icon' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
            'feature_image' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
        ]);

        DB::beginTransaction();

        try {
            // Generate unique slug
            $slug = Str::slug($request->title);
            if (Practice::where('slug', $slug)->exists()) {
                $slug .= '-' . time();
            }

            $practice = new Practice();
            $practice->title = $request->title;
            $practice->slug = $slug;
            $practice->excerpt = $request->excerpt;
            $practice->description = $request->description;

            // Upload icon
            if ($request->hasFile('icon')) {
                $iconFile = $request->file('icon');
                $iconFilename = 'icon-' . time() . '.' . $iconFile->getClientOriginalExtension();
                $iconFile->move(public_path('uploads/practices/icons'), $iconFilename);
                $practice->icon = 'uploads/practices/icons/' . $iconFilename;
            }

            // Upload feature image
            if ($request->hasFile('feature_image')) {
                $featureImageFile = $request->file('feature_image');
                $featureImageFilename = 'feature-' . time() . '.' . $featureImageFile->getClientOriginalExtension();
                $featureImageFile->move(public_path('uploads/practices/feature_images'), $featureImageFilename);
                $practice->feature_image = 'uploads/practices/feature_images/' . $featureImageFilename;
            }

            $practice->save();

            DB::commit();

            return redirect()->route('practices.index')->with('success', 'Practice created successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Something went wrong: ' . $e->getMessage()]);
        }
    }


    public function edit($id)
    {
        $practice = Practice::findOrFail($id);
        return view('admin.practices.edit', compact('practice'));
    }





    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string',
            'description' => 'nullable|string',
            'icon' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
            'feature_image' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
        ]);

        DB::beginTransaction();

        try {
            $practice = Practice::findOrFail($id);

            // If title is changed, regenerate slug
            if ($request->title !== $practice->title) {
                $slug = Str::slug($request->title);
                if (Practice::where('slug', $slug)->where('id', '!=', $id)->exists()) {
                    $slug .= '-' . time();
                }
                $practice->slug = $slug;
            }

            $practice->title = $request->title;
            $practice->excerpt = $request->excerpt;
            $practice->description = $request->description;

            // Update icon if new file is uploaded
            if ($request->hasFile('icon')) {
                // Delete old icon
                if ($practice->icon && File::exists(public_path($practice->icon))) {
                    File::delete(public_path($practice->icon));
                }

                $iconFile = $request->file('icon');
                $iconFilename = 'icon-' . time() . '.' . $iconFile->getClientOriginalExtension();
                $iconFile->move(public_path('uploads/practices/icons'), $iconFilename);
                $practice->icon = 'uploads/practices/icons/' . $iconFilename;
            }

            // Update feature image if new file is uploaded
            if ($request->hasFile('feature_image')) {
                // Delete old image
                if ($practice->feature_image && File::exists(public_path($practice->feature_image))) {
                    File::delete(public_path($practice->feature_image));
                }

                $featureImageFile = $request->file('feature_image');
                $featureImageFilename = 'feature-' . time() . '.' . $featureImageFile->getClientOriginalExtension();
                $featureImageFile->move(public_path('uploads/practices/feature_images'), $featureImageFilename);
                $practice->feature_image = 'uploads/practices/feature_images/' . $featureImageFilename;
            }

            $practice->save();

            DB::commit();

            return redirect()->route('practices.index')->with('success', 'Practice updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Something went wrong: ' . $e->getMessage()]);
        }
    }



    public function destroy($id)
    {
        try {
            $practice = Practice::findOrFail($id);

            // Delete icon file if exists
            if ($practice->icon && File::exists(public_path($practice->icon))) {
                File::delete(public_path($practice->icon));
            }

            // Delete feature image file if exists
            if ($practice->feature_image && File::exists(public_path($practice->feature_image))) {
                File::delete(public_path($practice->feature_image));
            }

            // Delete record from database
            $practice->delete();

            return redirect()->route('practices.index')->with('success', 'Practice deleted successfully!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to delete: ' . $e->getMessage()]);
        }
    }
}
