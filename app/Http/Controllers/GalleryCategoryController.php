<?php

namespace App\Http\Controllers;

use App\Models\GalleryCategory;
use Illuminate\Http\Request;

class GalleryCategoryController extends Controller
{
    public function index()
    {
        $categories = GalleryCategory::withCount('images')
            ->orderBy('name')
            ->get();

        return view('backend.gallery.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('backend.gallery.categories.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        GalleryCategory::create($data);

        return redirect()->route('admin.gallery.categories.index')
            ->with('success', 'Category created successfully.');
    }

    public function edit(GalleryCategory $category)
    {
        return view('backend.gallery.categories.edit', compact('category'));
    }

    public function update(Request $request, GalleryCategory $category)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category->update($data);

        return redirect()->route('admin.gallery.categories.index')
            ->with('success', 'Category updated successfully.');
    }

    public function destroy(GalleryCategory $category)
    {
        $category->images()->detach();
        $category->delete();

        return redirect()->route('admin.gallery.categories.index')
            ->with('success', 'Category deleted successfully.');
    }
}
