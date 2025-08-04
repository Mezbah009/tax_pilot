<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\ClientCategory;
use App\Models\TempImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $sections = Client::with('clientCategory')->latest();

        if (!empty($request->get('keyword'))) {
            $keyword = $request->get('keyword');
            $sections = $sections->where(function ($query) use ($keyword) {
                $query->where('link', 'like', '%' . $keyword . '%')
                    ->orWhereHas('clientCategory', function ($q) use ($keyword) {
                        $q->where('name', 'like', '%' . $keyword . '%');
                    });
            });
        }

        $sections = $sections->paginate(10);

        return view('admin.clients.list', compact('sections'));
    }


    public function create()
    {
        $categories = ClientCategory::where('status', 1)->orderBy('name')->get();
        return view('admin.clients.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'client_category_id' => 'nullable|exists:client_categories,id',
            'link' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation rules for logo
        ]);

        if ($validator->passes()) {
            $client = new Client();
            $client->client_category_id = $request->client_category_id;
            $client->link = $request->link;

            if (!empty($request->image_id)) {
                $tempImage = TempImage::find($request->image_id);

                if ($tempImage) {
                    $extArray = explode('.', $tempImage->name);
                    $ext = last($extArray);
                    $newImageName = uniqid() . '.' . $ext;
                    $sPath = public_path() . '/temp/' . $tempImage->name;
                    $dPath = public_path() . '/uploads/first_section/' . $newImageName;

                    File::copy($sPath, $dPath);
                    $client->logo = $newImageName;
                }
            }

            $client->save();

            return redirect()->route('clients.index')->with('success', 'Client added successfully');
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }



    public function edit($id)
    {
        $client = Client::findOrFail($id);
        $categories = ClientCategory::where('status', 1)->orderBy('name')->get();

        return view('admin.clients.edit', compact('client', 'categories'));
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'client_category_id' => 'nullable|exists:client_categories,id',
            'link' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->passes()) {
            $client = Client::findOrFail($id);

            $client->client_category_id = $request->client_category_id;
            $client->link = $request->link;

            if (!empty($request->image_id)) {
                $tempImage = TempImage::find($request->image_id);

                if ($tempImage) {
                    $extArray = explode('.', $tempImage->name);
                    $ext = last($extArray);
                    $newImageName = uniqid() . '.' . $ext;
                    $sPath = public_path() . '/temp/' . $tempImage->name;
                    $dPath = public_path() . '/uploads/first_section/' . $newImageName;

                    File::copy($sPath, $dPath);
                    $client->logo = $newImageName;
                }
            }

            $client->save();

            return redirect()->route('clients.index')->with('success', 'Client updated successfully');
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }



    public function destroy($id)
    {
        $clients = Client::findOrFail($id);
        $clients->delete();

        // Flash success message
        session()->flash('success', 'Client deleted successfully');

        // Return JSON response
        return response()->json([
            'status' => true,
            'message' => 'Client deleted successfully'
        ]);
    }
}
