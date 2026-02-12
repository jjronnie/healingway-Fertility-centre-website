<?php

namespace App\Http\Controllers;

use App\Models\Service;
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
            'name' => 'required|string|max:255',
            'desc' => 'nullable|string|max:500',
            'icon' => 'nullable|string|max:255',
            'body' => 'nullable|string',
            'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:10240'],
            'is_featured' => ['boolean'],
        ]);

        $data = $request->except('photo');

        $service = Service::create($data);

        if ($request->hasFile('photo')) {
            $service->addMediaFromRequest('photo')->toMediaCollection('photo');
        }

        return redirect()->route('admin.services.index')->with('success', 'Service created successfully.');
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
    public function edit(Service $service)
    {
        return view('backend.services.edit', compact('service'));
    }



    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'nullable|string|max:500',
            'icon' => 'nullable|string|max:255',
            'body' => 'nullable|string',
            'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:10240'],
            'is_featured' => ['boolean'],
        ]);

        $data = $request->except('photo');

        $service->update($data);

        if ($request->hasFile('photo')) {
            $service->addMediaFromRequest('photo')->toMediaCollection('photo');
        }


        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('services.index')->with('success', 'Service deleted successfully');
    }
}
