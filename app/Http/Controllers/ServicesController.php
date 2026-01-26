<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;



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
            'photo' => 'nullable|image|max:4096',
            'is_featured' => ['boolean'],
        ]);

        $data = $request->all();


        if ($request->hasFile('photo')) {
            $file = $request->file('photo');

            $safeName = Str::slug($request->name); // sanitize input
            $timestamp = now()->format('YmdHis');
            $extension = $file->getClientOriginalExtension();

            $filename = "{$safeName}-{$timestamp}.{$extension}";

            $data['photo'] = Storage::disk('public')
                ->putFileAs('services', $file, $filename);
        }



        Service::create($data);

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
            'photo' => 'nullable|image|max:4096',
            'is_featured' => ['boolean'],
        ]);

        $data = $request->all();


        if ($request->hasFile('photo')) {
            $file = $request->file('photo');

            // Delete old photo if it exists
            if (!empty($service->photo) && Storage::disk('public')->exists($service->photo)) {
                Storage::disk('public')->delete($service->photo);
            }

            $safeName = Str::slug($request->name);
            $timestamp = now()->format('YmdHis');
            $extension = $file->getClientOriginalExtension();

            $filename = "{$safeName}-{$timestamp}.{$extension}";

            $data['photo'] = Storage::disk('public')
                ->putFileAs('services', $file, $filename);
        }


        $service->update($data);


        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        // Delete photo if it exists
        if (!empty($service->photo) && Storage::disk('public')->exists($service->photo)) {
            Storage::disk('public')->delete($service->photo);
        }

        $service->delete();
        return redirect()->route('services.index')->with('success', 'Service deleted successfully');
    }
}
