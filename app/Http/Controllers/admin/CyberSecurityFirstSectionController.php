<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CyberSecurityFirstSection;
use App\Models\CyberSecuritySecondSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CyberSecurityFirstSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections = CyberSecurityFirstSection::all();
        $second_sections = CyberSecuritySecondSection::all(); // Fetch second section data

        return view('admin.cyber_security.index', compact('sections', 'second_sections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cyber_security.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);


        $imagePath = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('front-assets/img/cyber-security'), $imageName);
            $imagePath = 'front-assets/img/cyber-security/' . $imageName;
        }

        CyberSecurityFirstSection::create([
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('cyber_security.index')->with('success', 'Section created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $section = CyberSecurityFirstSection::findOrFail($id);
        return view('admin.cyber_security.edit', compact('section'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $section = CyberSecurityFirstSection::findOrFail($id);

        $request->validate([
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($section->image && file_exists(public_path($section->image))) {
                unlink(public_path($section->image));
            }

            // Upload new image
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('front-assets/img/cyber-security'), $imageName);
            $section->image = 'front-assets/img/cyber-security/' . $imageName;
        }

        $section->description = $request->description ?? $section->description;
        $section->save();

        return redirect()->route('cyber_security.index')->with('success', 'Section updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $section = CyberSecurityFirstSection::findOrFail($id);

        if ($section->image && file_exists(public_path($section->image))) {
            unlink(public_path($section->image));
        }

        $section->delete();

        return redirect()->route('cyber_security.index')->with('success', 'Section deleted successfully.');
    }





    //----------------------------------- Second Section----------------------------------------------



    /**
     * Show the form for creating a new resource.
     */
    public function createSecondSection()
    {
        return view('admin.cyber_security_second_section.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeSecondSection(Request $request)
    {
        // Validate request
        $validator = Validator::make($request->all(), [
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Create new section
        $second_sections = new CyberSecuritySecondSection();
        $second_sections->title = $request->title;
        $second_sections->description = $request->description;

        // Handle image upload (store in `public/uploads/first_section`)
        if ($request->hasFile('icon')) {
            $icon = $request->file('icon');
            $iconName = 'icon_' . time() . '.' . $icon->getClientOriginalExtension();
            $icon->move(public_path('front-assets/img/cyber-security'), $iconName);
            $second_sections->icon = 'front-assets/img/cyber-security/' . $iconName;
        }

        $second_sections->save();

        return redirect()->route('cyber_security.index')->with('success', 'Section created successfully.');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function editSecondSection($id)
    {
        $section = CyberSecuritySecondSection::findOrFail($id);
        return view('admin.cyber_security_second_section.edit', compact('section'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateSecondSection(Request $request, $id)
    {
        // Validate request
        $validator = Validator::make($request->all(), [
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $second_sections = CyberSecuritySecondSection::findOrFail($id);
        $second_sections->title = $request->title;
        $second_sections->description = $request->description;

        // Handle image update
        if ($request->hasFile('icon')) {
            // Delete old image if exists
            if ($second_sections->icon && file_exists(public_path($second_sections->icon))) {
                unlink(public_path($second_sections->icon));
            }

            $icon = $request->file('icon');
            $iconName = 'icon_' . time() . '.' . $icon->getClientOriginalExtension();
            $icon->move(public_path('front-assets/img/cyber-security/'), $iconName);
            $second_sections->icon = 'front-assets/img/cyber-security/' . $iconName;
        }

        $second_sections->save();

        return redirect()->route('cyber_security.index')->with('success', 'Section updated successfully.');
    }

    public function destroySecondSection($id)
    {
        $second_sections = CyberSecuritySecondSection::findOrFail($id);

        // Delete associated image from `public/uploads/first_section`
        if ($second_sections->icon && file_exists(public_path($second_sections->icon))) {
            unlink(public_path($second_sections->icon));
        }

        $second_sections->delete();

        return redirect()->route('cyber_security.index')->with('success', 'Section deleted successfully.');
    }
}
