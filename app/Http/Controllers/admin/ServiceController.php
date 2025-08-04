<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\TempImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;


class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $services = Service::query()->latest();

        if (!empty($request->get('keyword'))) {
            $services->where('title', 'like', '%' . $request->get('keyword') . '%');
        }

        $services = $services->paginate(10);
        return view('admin.services.list', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image_id' => 'required',
            'title' => 'required|string',
            'description' => 'nullable',

        ]);

        if ($validator->passes()) {
            $services = new Service();
            $services->title = $request->title;
            $services->description = $request->description;

            if (!empty($request->image_id)) {
                $tempImage = TempImage::find($request->image_id);
                $extArray = explode('.', $tempImage->name);
                $ext = last($extArray);
                $newImageName = uniqid() . '.' . $ext;
                $sPath = public_path('/temp/' . $tempImage->name);
                $dPath = public_path('/uploads/services/' . $newImageName);
                File::copy($sPath, $dPath);
                $services->image = $newImageName;
            }

            $services->save();

            return redirect()->route('services.index')->with('success', 'Services added successfully');
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function edit($id)
    {
        $services = Service::findOrFail($id);
        return view('admin.services.edit', compact('services'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
        ]);

        if ($validator->passes()) {
            $services = Service::findOrFail($id);
            $services->title = $request->title;
            $services->description = $request->description;

            if (!empty($request->image_id)) {
                $tempImage = TempImage::find($request->image_id);
                $extArray = explode('.', $tempImage->name);
                $ext = last($extArray);
                $newImageName = uniqid() . '.' . $ext;
                $sPath = public_path('/temp/' . $tempImage->name);
                $dPath = public_path('/uploads/services/' . $newImageName);
                File::copy($sPath, $dPath);

                if (!empty($caseStudy->image) && file_exists(public_path('/uploads/services/' . $services->image))) {
                    unlink(public_path('/uploads/services/' . $services->image));
                }
                $services->image = $newImageName;
            }

            $services->save();

            return redirect()->route('services.index')->with('success', 'Services updated successfully');
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function destroy($id)
    {
        $services = Service::findOrFail($id);
        $services->delete();

        session()->flash('success', 'Services deleted successfully');

        return response()->json([
            'status' => true,
            'message' => 'Services deleted successfully'
        ]);
    }
}
