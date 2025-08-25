<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str; 

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $doctors = Doctor::orderBy('display_position')->orderBy('name')->paginate(10);
        return view('backend.doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.doctors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
 public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'nullable|string|max:255',
            'body' => 'nullable|string',
            'photo' => 'nullable|image|max:2048', 
            'display_position' => 'nullable|integer|min:0',
        ]);

        $data = $request->except('photo');

        // Handle photo upload
        if ($request->hasFile('photo')) {
            $imageName = time() . '_' . Str::slug($request->name) . '.' . $request->photo->extension();
            $request->photo->move(public_path('uploads/doctors'), $imageName);
            $data['photo'] = 'uploads/doctors/' . $imageName;
        }

        // The setNameAttribute in the model handles slug generation
        Doctor::create($data);

        return redirect()->route('admin.doctors.index')->with('success', 'Doctor added successfully!');
    }

    /**
     * Display the specified resource.
     */
     public function show(Doctor $doctor)
    {
        return view('backend.doctors.show', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        return view('backend.doctors.edit', compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     */
 public function update(Request $request, Doctor $doctor)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'nullable|string|max:255',
            'body' => 'nullable|string',
            'photo' => 'nullable|image|max:2048',
            'display_position' => 'nullable|integer|min:0',
        ]);

        $data = $request->except('photo');

        // Handle photo update
        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($doctor->photo && file_exists(public_path($doctor->photo))) {
                unlink(public_path($doctor->photo));
            }
            $imageName = time() . '_' . Str::slug($request->name) . '.' . $request->photo->extension();
            $request->photo->move(public_path('uploads/doctors'), $imageName);
            $data['photo'] = 'uploads/doctors/' . $imageName;
        }

        // The setNameAttribute in the model handles slug regeneration if name changes
        $doctor->update($data);

        return redirect()->route('admin.doctors.index')->with('success', 'Doctor updated successfully!');
    }
    /**
     * Remove the specified resource from storage.
     */
     public function destroy(Doctor $doctor)
    {
        // Delete photo if exists
        if ($doctor->photo && file_exists(public_path($doctor->photo))) {
            unlink(public_path($doctor->photo));
        }

        $doctor->delete();

        return redirect()->route('admin.doctors.index')->with('success', 'Doctor deleted successfully!');
    }
}
