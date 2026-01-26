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
            'photo' => 'nullable|image|max:4096',
            'display_position' => 'nullable|integer|min:0',
        ]);

        $data = $request->all();

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');

            $safeName = Str::slug($request->name); // sanitize input
            $timestamp = now()->format('YmdHis');
            $extension = $file->getClientOriginalExtension();

            $filename = "{$safeName}-{$timestamp}.{$extension}";

            $data['photo'] = Storage::disk('public')
                ->putFileAs('staff', $file, $filename);
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
            'photo' => 'nullable|image|max:4096',
            'display_position' => 'nullable|integer|min:0',
        ]);

        $data = $request->except('photo');

         if ($request->hasFile('photo')) {
            $file = $request->file('photo');

            // Delete old photo if it exists
            if (!empty($staff->photo) && Storage::disk('public')->exists($staff->photo)) {
                Storage::disk('public')->delete($staff->photo);
            }

            $safeName = Str::slug($request->name);
            $timestamp = now()->format('YmdHis');
            $extension = $file->getClientOriginalExtension();

            $filename = "{$safeName}-{$timestamp}.{$extension}";

            $data['photo'] = Storage::disk('public')
                ->putFileAs('staff', $file, $filename);
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
        // Delete photo if it exists
        if (!empty($staff->photo) && Storage::disk('public')->exists($staff->photo)) {
            Storage::disk('public')->delete($staff->photo);
        }
        $staff->delete();

        return redirect()->route('admin.staff.index')->with('success', 'Staff deleted successfully!');
    }
}
