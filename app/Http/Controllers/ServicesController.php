<?php

namespace App\Http\Controllers;
use \App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
            'name'  => 'required|string|max:255',
            'desc'  => 'nullable|string|max:500',
            'icon'  => 'nullable|string|max:255',
            'body'  => 'nullable|string',
            'photo' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('services', 'public');
        }

        Service::create($data);

    return redirect()->route('services.index')->with('success', 'Service created successfully.');
    }

    /**
     * Display the specified resource.
     */
   public function show(Service $service)
    {
        return view('backend.services.show', compact('service'));
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
            'name'  => 'required|string|max:255',
            'desc'  => 'nullable|string|max:500',
            'icon'  => 'nullable|string|max:255',
            'body'  => 'nullable|string',
            'photo' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('services', 'public');
        }

        $service->update($data);


    return redirect()->route('services.index')->with('success', 'Service updated successfully.');
}
    /**
     * Remove the specified resource from storage.
     */
   public function destroy(Service $service)
    {
        if ($service->photo && file_exists(storage_path('app/public/'.$service->photo))) {
            unlink(storage_path('app/public/'.$service->photo));
        }

        $service->delete();
        return redirect()->route('services.index')->with('success', 'Service deleted successfully');
    }
}
