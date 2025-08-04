<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Showcase;
use Illuminate\Http\Request;

class ShowcaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $showcases = Showcase::latest()->paginate(10);
        return view('admin.showcases.index', compact('showcases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.showcases.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'year' => 'required|integer',
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $showcase = new Showcase();
        $showcase->year = $request->year;
        $showcase->title = $request->title;

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('front-assets/img/service-showcase'), $imageName);
            $showcase->image = 'front-assets/img/service-showcase/' . $imageName;
        }

        $showcase->save();

        return redirect()->route('showcases.index')->with('success', 'Showcase created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Showcase $showcase)
    {
        return view('admin.showcases.edit', compact('showcase'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Showcase $showcase)
    {
        $request->validate([
            'year' => 'required|integer',
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $showcase->year = $request->year;
        $showcase->title = $request->title;

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('front-assets/img/service-showcase'), $imageName);
            $showcase->image = 'front-assets/img/service-showcase/' . $imageName;
        }

        $showcase->save();

        return redirect()->route('showcases.index')->with('success', 'Showcase updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Showcase $showcase)
    {
        if ($showcase->image && file_exists(public_path($showcase->image))) {
            unlink(public_path($showcase->image));
        }

        $showcase->delete();

        return redirect()->route('showcases.index')->with('success', 'Showcase deleted successfully!');
    }
}
