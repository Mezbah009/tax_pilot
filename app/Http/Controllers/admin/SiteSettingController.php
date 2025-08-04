<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use App\Models\TempImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class SiteSettingController extends Controller
{
    public function index(Request $request)
    {
        $settings = SiteSetting::latest();
        if (!empty($request->get('keyword'))) {
            $settings = $settings->where('site_title', 'like', '%' . $request->get('keyword') . '%');
        }

        $settings = $settings->latest()->paginate(10);
        return view('admin.site_settings.index', compact('settings'));
    }

    public function create()
    {
        return view('admin.site_settings.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'site_title' => 'required|string|max:255',
            'logo_image_id' => 'nullable|exists:temp_images,id',
            'favicon_image_id' => 'nullable|exists:temp_images,id',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'copyright_text' => 'nullable|string',
        ]);

        if ($validator->passes()) {
            $setting = new SiteSetting();
            $setting->site_title = $request->site_title;
            $setting->meta_description = $request->meta_description;
            $setting->meta_keywords = $request->meta_keywords;
            $setting->copyright_text = $request->copyright_text;

            // Move logo
            if (!empty($request->logo_image_id)) {
                $tempImage = TempImage::find($request->logo_image_id);
                if ($tempImage) {
                    $ext = pathinfo($tempImage->name, PATHINFO_EXTENSION);
                    $newName = uniqid() . '.' . $ext;
                    $src = public_path('temp/' . $tempImage->name);
                    $dest = public_path('uploads/logo/' . $newName);
                    File::copy($src, $dest);
                    $setting->logo = $newName;
                }
            }

            // Move favicon
            if (!empty($request->favicon_image_id)) {
                $tempImage = TempImage::find($request->favicon_image_id);
                if ($tempImage) {
                    $ext = pathinfo($tempImage->name, PATHINFO_EXTENSION);
                    $newName = uniqid() . '.' . $ext;
                    $src = public_path('temp/' . $tempImage->name);
                    $dest = public_path('uploads/favicon/' . $newName);
                    File::copy($src, $dest);
                    $setting->favicon = $newName;
                }
            }

            $setting->save();

            $request->session()->flash('success', 'Website settings saved successfully');
            return response()->json([
                'status' => true,
                'message' => 'Website settings saved successfully'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }

    }

    public function edit($id)
    {
        $setting = SiteSetting::findOrFail($id);
        return view('admin.site_settings.edit', compact('setting'));
    }

    public function update(Request $request, $id)
    {
        $setting = SiteSetting::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'site_title' => 'required|string|max:255',
            'logo_image_id' => 'nullable|exists:temp_images,id',
            'favicon_image_id' => 'nullable|exists:temp_images,id',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'copyright_text' => 'nullable|string',
        ]);

        if ($validator->passes()) {
            $setting->site_title = $request->site_title;
            $setting->meta_description = $request->meta_description;
            $setting->meta_keywords = $request->meta_keywords;
            $setting->copyright_text = $request->copyright_text;

            // Logo update
            if (!empty($request->logo_image_id)) {
                $tempImage = TempImage::find($request->logo_image_id);
                if ($tempImage) {
                    $ext = pathinfo($tempImage->name, PATHINFO_EXTENSION);
                    $newName = uniqid() . '.' . $ext;
                    $src = public_path('temp/' . $tempImage->name);
                    $dest = public_path('uploads/logo/' . $newName);
                    File::copy($src, $dest);
                    $setting->logo = $newName;
                }
            }

            // Favicon update
            if (!empty($request->favicon_image_id)) {
                $tempImage = TempImage::find($request->favicon_image_id);
                if ($tempImage) {
                    $ext = pathinfo($tempImage->name, PATHINFO_EXTENSION);
                    $newName = uniqid() . '.' . $ext;
                    $src = public_path('temp/' . $tempImage->name);
                    $dest = public_path('uploads/favicon/' . $newName);
                    File::copy($src, $dest);
                    $setting->favicon = $newName;
                }
            }

            $setting->save();


            $request->session()->flash('success', 'Website settings updated successfully.');
            return response()->json([
                'status' => true,
                'message' => 'Website settings updated successfully.'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }

    }

    public function destroy($id)
    {
        $setting = SiteSetting::findOrFail($id);

        if ($setting->logo && File::exists(public_path('uploads/logo/' . $setting->logo))) {
            File::delete(public_path('uploads/logo/' . $setting->logo));
        }

        if ($setting->favicon && File::exists(public_path('uploads/favicon/' . $setting->favicon))) {
            File::delete(public_path('uploads/favicon/' . $setting->favicon));
        }

        $setting->delete();

        return redirect()->route('site-settings.index')
            ->with('success', 'Website setting deleted successfully.');
    }

}
