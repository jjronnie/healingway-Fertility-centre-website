<?php

namespace App\Models;

use App\Support\HasOptimizedWebpImages;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Staff extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    use HasOptimizedWebpImages;

    protected $fillable = [
        'name',
        'position',
        'body',
        'photo',
        'slug',
        'display_position',
    ];



    protected static function booted()
    {
        static::saved(fn () => Cache::forget('sitemap.xml'));
        static::deleted(fn () => Cache::forget('sitemap.xml'));
    }



    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('photo')->singleFile();
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->registerOptimizedWebpConversions($media);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($staff) {
            $staff->slug = $staff->generateUniqueSlug($staff->name);
        });

        static::updating(function ($staff) {
            if ($staff->isDirty('name')) { // Only regenerate slug if name changes
                $staff->slug = $staff->generateUniqueSlug($staff->name);
            }
        });
    }


    protected function generateUniqueSlug($name)
    {
        $slug = Str::slug($name);
        $originalSlug = $slug;
        $count = 1;

        while (static::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        return $slug;
    }
}
