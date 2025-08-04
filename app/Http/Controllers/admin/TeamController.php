<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\TempImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class TeamController extends Controller
{
    public function index(Request $request)
    {
        $query = User::where('role', '!=', 2)->latest();

        if ($request->has('keyword')) {
            $query->where('name', 'like', '%' . $request->get('keyword') . '%');
        }

        $teamMembers = $query->paginate(10);

        return view('admin.team.list', compact('teamMembers'));
    }

    public function create()
    {
        return view('admin.team.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'designation' => 'nullable|string',
            'twitter' => 'nullable|string',
            'facebook' => 'nullable|string',
            'instagram' => 'nullable|string',
            'linkedin' => 'nullable|string',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }
    
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->designation = $request->designation;
        $user->twitter = $request->twitter;
        $user->facebook = $request->facebook;
        $user->instagram = $request->instagram;
        $user->linkedin = $request->linkedin;
        $user->password = bcrypt('1234'); // Set a default password
    
        $user->save();
    
        // Save image here
        if (!empty($request->image_id)) {
            $tempImage = TempImage::find($request->image_id);
    
            $extArray = explode('.', $tempImage->name);
            $ext = last($extArray);
            $newImageName = $user->id . '.' . $ext;
            $sPath = public_path() . '/temp/' . $tempImage->name;
            $dPath = public_path() . '/uploads/users/' . $newImageName;
    
            File::copy($sPath, $dPath);
    
            $user->image = $newImageName;
            $user->save();
        }
    
        return response()->json([
            'status' => true,
            'message' => 'Team member added successfully',
        ]);
    }
    
    public function edit($id)
    {
        $teamMember = User::findOrFail($id);

        return view('admin.team.edit', compact('teamMember'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'designation' => 'nullable|string',
            'twitter' => 'nullable|string',
            'facebook' => 'nullable|string',
            'instagram' => 'nullable|string',
            'linkedin' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->designation = $request->designation;
        $user->twitter = $request->twitter;
        $user->facebook = $request->facebook;
        $user->instagram = $request->instagram;
        $user->linkedin = $request->linkedin;

        $user->save();

        if (!empty($request->image_id)) {
            $tempImage = TempImage::find($request->image_id);
    
            $extArray = explode('.', $tempImage->name);
            $ext = last($extArray);
            $newImageName = $user->id . '.' . $ext;
            $sPath = public_path() . '/temp/' . $tempImage->name;
            $dPath = public_path() . '/uploads/users/' . $newImageName;
    
            File::copy($sPath, $dPath);
    
            $user->image = $newImageName;
            $user->save();
        }

        return response()->json([
            'status' => true,
            'message' => 'Team member updated successfully',
        ]);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Delete the user's image if exists
        if (!empty($user->image)) {
            File::delete(public_path('uploads/team/' . $user->image));
        }

        $user->delete();

        return response()->json([
            'status' => true,
            'message' => 'Team member deleted successfully',
        ]);
    }
}
