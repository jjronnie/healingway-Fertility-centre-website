<?php

namespace App\Http\Controllers;

use App\Models\GalleryCategory;
use App\Models\GalleryImage;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $categories = GalleryCategory::query()
            ->whereHas('images', fn($q) => $q->where('is_ready', true))
            ->withCount(['images as images_count' => fn($q) => $q->where('is_ready', true)])
            ->with(['images' => fn($q) => $q->where('is_ready', true)->latest()->take(1)])
            ->orderBy('name')
            ->get();

        $latestImages = GalleryImage::where('is_ready', true)
            ->latest()
            ->paginate(20);

        $nextPageUrl = $latestImages->hasMorePages()
            ? route('gallery.load', ['page' => $latestImages->currentPage() + 1])
            : null;

        return view('gallery.index', compact('categories', 'latestImages', 'nextPageUrl'));
    }

    public function category(string $slug)
    {
        $category = GalleryCategory::where('slug', $slug)
            ->whereHas('images', fn($q) => $q->where('is_ready', true))
            ->firstOrFail();

        $images = $category->images()
            ->where('is_ready', true)
            ->latest()
            ->paginate(20);

        $nextPageUrl = $images->hasMorePages()
            ? route('gallery.category.load', ['slug' => $category->slug, 'page' => $images->currentPage() + 1])
            : null;

        $otherCategories = GalleryCategory::query()
            ->where('id', '!=', $category->id)
            ->whereHas('images', fn($q) => $q->where('is_ready', true))
            ->orderBy('name')
            ->get();

        return view('gallery.category', compact('category', 'images', 'nextPageUrl', 'otherCategories'));
    }

    public function loadAll(Request $request)
    {
        $images = GalleryImage::where('is_ready', true)
            ->latest()
            ->paginate(20);

        return response()->json($this->formatPaginatedImages($images));
    }

    public function loadCategory(Request $request, string $slug)
    {
        $category = GalleryCategory::where('slug', $slug)->firstOrFail();

        $images = $category->images()
            ->where('is_ready', true)
            ->latest()
            ->paginate(20);

        return response()->json($this->formatPaginatedImages($images));
    }

    protected function formatPaginatedImages($images): array
    {
        return [
            'items' => $images->getCollection()->map(fn(GalleryImage $image) => [
                'id' => $image->id,
                'title' => $image->title,
                'description' => $image->description,
                'thumb_url' => $image->getFirstMediaUrl('gallery', 'thumb') ?: $image->getFirstMediaUrl('gallery', 'webp'),
                'webp_url' => $image->getFirstMediaUrl('gallery', 'webp'),
            ])->values(),
            'next_page_url' => $images->nextPageUrl(),
        ];
    }
}
