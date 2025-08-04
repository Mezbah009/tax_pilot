<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Number;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NumberController extends Controller
{
    public function index(Request $request)
    {
        $sections = Number::latest();
        if (!empty($request->get('keyword'))) {
            $sections = $sections->where('title', 'like', '%' . $request->get('keyword') . '%');
        }
        $sections = $sections->latest()->paginate(10);
        return view('admin.numbers.list', compact('sections'));
    }

    public function create()
    {
        return view('admin.numbers.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'email' => 'nullable|string',
            'phone' => 'nullable|string',
            'address' => 'nullable|string'  // ✅ New validation rule
        ]);

        if ($validator->passes()) {
            $numbers = new Number();
            $numbers->email = $request->email;
            $numbers->phone = $request->phone;
            $numbers->address = $request->address;  // ✅ New field assignment
            $numbers->save();

            // Redirect to index page
            return redirect()->route('numbers.index')->with('success', 'Number added successfully');
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }


    public function edit($id)
    {
        $numbers = Number::findOrFail($id);
        return view('admin.numbers.edit', compact('numbers'));
    }


    public function update(Request $request, $id)
{
    // Validate the request data
    $validator = Validator::make($request->all(), [
        'email' => 'nullable|string',
        'phone' => 'nullable|string',
        'address' => 'nullable|string', // ✅ Added address validation
    ]);

    if ($validator->passes()) {
        $numbers = Number::findOrFail($id);
        $numbers->email = $request->email;
        $numbers->phone = $request->phone;
        $numbers->address = $request->address; // ✅ Assign new address value
        $numbers->save();

        // Redirect to index page
        return redirect()->route('numbers.index')->with('success', 'Numbers updated successfully');
    } else {
        return response()->json([
            'status' => false,
            'errors' => $validator->errors()
        ]);
    }
}


    public function destroy($id)
    {
        $clients = Number::findOrFail($id);
        $clients->delete();

        // Flash success message
        session()->flash('success', 'Number deleted successfully');

        // Return JSON response
        return response()->json([
            'status' => true,
            'message' => 'Number deleted successfully'
        ]);
    }
}
