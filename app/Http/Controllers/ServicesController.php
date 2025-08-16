<?php

namespace App\Http\Controllers;
use \App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::all();
        return view('backend.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.services.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string|max:255',
        'icon' => 'nullable|string|max:255',
        'body' => 'nullable|string',
    ]);

    Service::create($request->all());
    return redirect()->route('services.index')->with('success', 'Service created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('backend.services.show');
        
    }

    /**
     * Show the form for editing the specified resource.
     */
 public function edit(Service $service) {
    return view('backend.services.edit', compact('service'));
}


    /**
     * Update the specified resource in storage.
     */
  // Edit form

// Update
public function update(Request $request, Service $service) {
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string|max:255',
        'icon' => 'nullable|string|max:255',
        'body' => 'nullable|string',
    ]);

    $service->update($request->all());
    return redirect()->route('services.index')->with('success', 'Service updated successfully.');
}
    /**
     * Remove the specified resource from storage.
     */
 public function destroy(Service $service) {
    $service->delete();
    return redirect()->route('services.index')->with('success', 'Service deleted.');
}
}
