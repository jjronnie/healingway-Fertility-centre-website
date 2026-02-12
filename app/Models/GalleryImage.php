<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class GalleryImage extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'title',
        'description',
        'is_ready',
    ];

    protected $casts = [
        'is_ready' => 'boolean',
    ];

    public function categories()
    {
        return $this->belongsToMany(GalleryCategory::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('gallery')->singleFile();
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('webp')
            ->format('webp')
            ->quality(80)
            ->fit(Fit::Max, 1800, 1800)
            ->performOnCollections('gallery');

        $this->addMediaConversion('thumb')
            ->format('webp')
            ->quality(75)
            ->fit(Fit::Crop, 500, 500)
            ->performOnCollections('gallery');
    }
}
