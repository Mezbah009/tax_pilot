<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $sections = Contact::latest();
        if (!empty($request->get('keyword'))) {
            $sections = $sections->where('title', 'like', '%' . $request->get('keyword') . '%');
        }
        $sections = $sections->latest()->paginate(10);
        return view('admin.contact.list', compact('sections'));
    }

    public function create()
    {
        return view('admin.contact.create');
    }

   public function store(Request $request)
{
    // Validate the request data
    $validator = Validator::make($request->all(), [
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'flag' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'country_name' => 'nullable|string',
        'company_name' => 'nullable|string',
        'office_name' => 'nullable|string',
        'address' => 'nullable|string',
        'mobile' => 'nullable|string|max:20',
        'website' => 'nullable|string',
        'linkedIn' => 'nullable|string',
        'facebook' => 'nullable|string',
        'youtube' => 'nullable|string',
    ]);

    // If validation fails
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Create new Contact instance
    $contact = new Contact();

    // Set text fields
    $contact->country_name = $request->country_name;
    $contact->company_name = $request->company_name;
    $contact->office_name = $request->office_name;
    $contact->address = $request->address;
    $contact->mobile = $request->mobile;
    $contact->website = $request->website;
    $contact->linkedIn = $request->linkedIn;
    $contact->facebook = $request->facebook;
    $contact->youtube = $request->youtube;

    // Handle image upload if exists
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = 'image_' . time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/first_section'), $imageName);
        $contact->image = $imageName;
    }

    // Handle flag upload if exists
    if ($request->hasFile('flag')) {
        $flag = $request->file('flag');
        $flagName = 'flag_' . time() . '.' . $flag->getClientOriginalExtension();
        $flag->move(public_path('uploads/first_section'), $flagName);
        $contact->flag = $flagName;
    }

    // Save contact
    $contact->save();

    // Redirect with success
    return redirect()->route('contact.index')->with('success', 'Contact created successfully');
}


    // Edit method

    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        return view('admin.contact.edit', compact('contact'));
    }

    // Update method
    public function update(Request $request, $id)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'flag' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'country_name' => 'nullable|string',
            'company_name' => 'nullable|string',
            'office_name' => 'nullable|string',
            'address' => 'nullable|string',
            'mobile' => 'nullable|string|max:20', // Added mobile field
            'website' => 'nullable|string',
            'linkedIn' => 'nullable|string',
            'facebook' => 'nullable|string',
            'youtube' => 'nullable|string',
        ]);

        // If validation fails, redirect back with errors
        if ($validator->passes()) {
            $contact = Contact::findOrFail($id);
            $contact->country_name = $request->country_name;
            $contact->company_name = $request->company_name;
            $contact->office_name = $request->office_name;
            $contact->address = $request->address;
            $contact->mobile = $request->mobile; // Assign mobile field
            $contact->website = $request->website;
            $contact->linkedIn = $request->linkedIn;
            $contact->facebook = $request->facebook;
            $contact->youtube = $request->youtube;

            // Handle image update
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = 'image_' . time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/first_section'), $imageName);
                $contact->image = $imageName;
            }

            // Handle flag update
            if ($request->hasFile('flag')) {
                $flag = $request->file('flag');
                $flagName = 'flag_' . time() . '.' . $flag->getClientOriginalExtension();
                $flag->move(public_path('uploads/first_section'), $flagName);
                $contact->flag = $flagName;
            }
            // Save the contact to the database
            $contact->save();

            return redirect()->route('contact.index')->with('success', 'Contact US updated successfully');
        } else {
            return back()->withErrors($validator)->withInput();
        }
    }

    public function destroy($id)
    {
        $clients = Contact::findOrFail($id);
        $clients->delete();

        // Flash success message
        session()->flash('success', 'Contact deleted successfully');

        // Return JSON response
        return response()->json([
            'status' => true,
            'message' => 'Contact deleted successfully'
        ]);
    }
}
