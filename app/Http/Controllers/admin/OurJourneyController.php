<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\OurJourney;
use Illuminate\Http\Request;

class OurJourneyController extends Controller
{
    // Show all journeys
    public function index()
    {
        $journeys = OurJourney::latest()->paginate(10);
        return view('admin.our_journey.index', compact('journeys'));
    }

    // Show the form to create a new journey
    public function create()
    {
        return view('admin.our_journey.create');
    }

    // Store a newly created journey in the database
    public function store(Request $request)
    {
        $request->validate([
            'year' => 'required|integer',
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $journey = new OurJourney();
        $journey->year = $request->year;
        $journey->title = $request->title;

        // Handle the image upload if present
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('front-assets/img/our-journey'), $imageName);
            $journey->image = 'front-assets/img/our-journey/'.$imageName;
        }

        $journey->save();

        return redirect()->route('journeys.index')->with('success', 'Journey created successfully');
    }

    // Show the form to edit a specific journey
    public function edit($id)
    {
        $journey = OurJourney::findOrFail($id);
        return view('admin.our_journey.edit', compact('journey'));
    }

    // Update the specified journey in the database
    public function update(Request $request, $id)
    {
        $request->validate([
            'year' => 'required|integer',
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $journey = OurJourney::findOrFail($id);
        $journey->year = $request->year;
        $journey->title = $request->title;

        // Handle the image upload if present
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('front-assets/img/our-journey'), $imageName);
            $journey->image = 'front-assets/img/our-journey/'.$imageName;
        }

        $journey->save();

        return redirect()->route('journeys.index')->with('success', 'Journey updated successfully');
    }

    // Remove the specified journey from the database
    public function destroy($id)
    {
        $journey = OurJourney::findOrFail($id);
        $journey->delete();

        return redirect()->route('journeys.index')->with('success', 'Journey deleted successfully');
    }
}
