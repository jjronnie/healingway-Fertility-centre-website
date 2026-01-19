<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staff = Staff::orderBy('display_position')->orderBy('name')->paginate(10);
        return view('backend.staff.index', compact('staff'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.staff.create');
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
            $request->photo->move(public_path('uploads/staff'), $imageName);
            $data['photo'] = 'uploads/staff/' . $imageName;
        }

        // The setNameAttribute in the model handles slug generation
        Staff::create($data);

        return redirect()->route('admin.staff.index')->with('success', 'Staff added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Staff $staff)
    {
        return view('backend.staff.show', compact('staff'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Staff $staff)
    {
        return view('backend.staff.edit', compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Staff $staff)
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
            if ($staff->photo && file_exists(public_path($staff->photo))) {
                unlink(public_path($staff->photo));
            }
            $imageName = time() . '_' . Str::slug($request->name) . '.' . $request->photo->extension();
            $request->photo->move(public_path('uploads/staff'), $imageName);
            $data['photo'] = 'uploads/staff/' . $imageName;
        }

        // The setNameAttribute in the model handles slug regeneration if name changes
        $staff->update($data);

        return redirect()->route('admin.staff.index')->with('success', 'staff updated successfully!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Staff $staff)
    {
        // Delete photo if exists
        if ($staff->photo && file_exists(public_path($staff->photo))) {
            unlink(public_path($staff->photo));
        }

        $staff->delete();

        return redirect()->route('admin.staff.index')->with('success', 'Staff deleted successfully!');
    }
}
