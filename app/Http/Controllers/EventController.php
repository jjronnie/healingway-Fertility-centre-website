<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::latest()->paginate(10);
        return view('backend.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'required|string|max:255',
            'body' => 'required|string',
            'featured_image' => 'nullable|image|max:4096',
            'venue' => 'nullable|string|max:255',
            'event_date' => 'nullable|date|after_or_equal:today',
            'event_time' => 'nullable',
            'end_date' => 'nullable|date|after_or_equal:today|after_or_equal:event_date',
            'end_time' => 'nullable',

            'status' => 'required|in:draft,published',
        ]);

        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = $request
                ->file('featured_image')
                ->store('events', 'public');
        }

        $data['created_by'] = Auth::id();

        Event::create($data);

        return redirect()->route('admin.events.index')->with('success', 'Event created .');

    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view('backend.events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'required|string|max:255',
            'body' => 'required|string',
            'featured_image' => 'nullable|image|max:4096',
            'venue' => 'nullable|string|max:255',
            'event_date' => 'nullable|date|after_or_equal:today',
            'event_time' => 'nullable',
            'end_date' => 'nullable|date|after_or_equal:today|after_or_equal:event_date',
            'end_time' => 'nullable',
            'status' => 'required|in:draft,published',
        ]);

        if ($request->hasFile('featured_image')) {
            if ($event->featured_image) {
                Storage::disk('public')->delete($event->featured_image);
            }

            $data['featured_image'] = $request
                ->file('featured_image')
                ->store('events', 'public');
        }

        $event->update($data);

        return redirect()->route('admin.events.index')->with('success', 'Event updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        if ($event->featured_image) {
            Storage::disk('public')->delete($event->featured_image);
        }

        $event->delete();

        return redirect()->back()->with('success', 'Event deleted');
    }
}
