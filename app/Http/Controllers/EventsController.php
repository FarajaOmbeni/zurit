<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventsController extends Controller
{
    public function index()
    {
        $events = Event::all();

        return view('events_admindash', compact('events'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'date' => 'required',
        ]);

        $imageName = ''; // Initialize image name variable

        // Handle file upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('events_res/img'), $imageName);
        }

        // Create blog with file path
        Event::create([
            'name' =>$request->input('name'),
            'image' => $imageName,
            'date' => $request->input('date'),
        ]);
        return redirect()->route('events.index')->with('success', 'Blog added successfully.');
    }

}
