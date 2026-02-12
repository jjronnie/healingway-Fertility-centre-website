<?php

namespace App\Http\Controllers;

use App\Models\GalleryCategory;
use App\Models\GalleryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GalleryImageController extends Controller
{
    public function index()
    {
        $images = GalleryImage::with('categories')
            ->latest()
            ->paginate(20);

        $categories = GalleryCategory::orderBy('name')->get();

        return view('backend.gallery.images.index', compact('images', 'categories'));
    }

    public function create()
    {
        $categories = GalleryCategory::orderBy('name')->get();

        return view('backend.gallery.images.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'categories' => 'nullable|array',
            'categories.*' => 'exists:gallery_categories,id',
            'photos' => 'required|array|max:20',
            'photos.*' => 'image|mimes:jpg,jpeg,png,webp|max:10240',
        ]);

        $categoryIds = $data['categories'] ?? [];

        foreach ($request->file('photos', []) as $photo) {
            $image = GalleryImage::create([
                'title' => $data['title'],
                'description' => $data['description'] ?? null,
                'is_ready' => false,
            ]);

            if (! empty($categoryIds)) {
                $image->categories()->sync($categoryIds);
            }

            $fileName = $this->buildMediaFileName($photo);

            $image->addMedia($photo)
                ->usingFileName($fileName)
                ->usingName(pathinfo($fileName, PATHINFO_FILENAME))
                ->toMediaCollection('gallery');
        }

        return redirect()->route('admin.gallery.images.index')
            ->with('success', 'Images uploaded successfully.');
    }

    public function update(Request $request, GalleryImage $image)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'categories' => 'nullable|array',
            'categories.*' => 'exists:gallery_categories,id',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',
        ]);

        $image->update([
            'title' => $data['title'],
            'description' => $data['description'] ?? null,
        ]);

        $image->categories()->sync($data['categories'] ?? []);

        if ($request->hasFile('photo')) {
            $image->clearMediaCollection('gallery');
            $photo = $request->file('photo');
            $fileName = $this->buildMediaFileName($photo);

            $image->addMedia($photo)
                ->usingFileName($fileName)
                ->usingName(pathinfo($fileName, PATHINFO_FILENAME))
                ->toMediaCollection('gallery');
            $image->is_ready = false;
            $image->save();
        }

        return redirect()->back()->with('success', 'Image updated successfully.');
    }

    public function destroy(GalleryImage $image)
    {
        $image->categories()->detach();
        $image->clearMediaCollection('gallery');
        $image->delete();

        return redirect()->back()->with('success', 'Image deleted successfully.');
    }

    protected function buildMediaFileName($file): string
    {
        $extension = $file->getClientOriginalExtension();
        $timestamp = now()->timestamp;
        $uuid = Str::uuid()->toString();

        return $extension
            ? "{$timestamp}-{$uuid}.{$extension}"
            : "{$timestamp}-{$uuid}";
    }
}
