<?php

namespace App\Models;

use App\Support\HasOptimizedWebpImages;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use Illuminate\Support\Facades\Cache;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;




class Service extends Model implements HasMedia
{
    use HasFactory;
    use HasSEO;
    use InteractsWithMedia;
    use HasOptimizedWebpImages;

    protected $fillable = [
        'name',
        'slug',
        'photo',
        'icon',
        'desc',
        'body',
        'is_featured'
    ];

    protected $casts = [
        'is_featured' => 'boolean',
    ];




    protected static function booted()
    {
        static::saving(function ($service) {
            if ($service->isDirty('name') || empty($service->slug)) {
                $service->slug = static::generateUniqueSlug($service->name, $service->id);
            }
        });

        static::saved(fn() => Cache::forget('sitemap.xml'));
        static::deleted(fn() => Cache::forget('sitemap.xml'));
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('photo')->singleFile();
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->registerOptimizedWebpConversions($media);
    }


    protected function syncSeo(): void
    {
        $imageUrl = $this->getFirstMediaUrl('photo', 'webp')
            ?: ($this->photo ? asset('storage/' . $this->photo) : asset('assets/img/1.webp'));

        $this->seo()->updateOrCreate(
            [],
            [
                'title' => $this->name,
                'description' => $this->desc,
                'image' => $imageUrl,
                'author' => 'HealingWay Fertility Centre',
                'canonical_url' => route('service.show', $this->slug),
                'robots' => 'index, follow',
            ]
        );
    }





    protected static function generateUniqueSlug(string $name, ?int $ignoreId = null): string
    {
        $slug = Str::slug($name);
        $original = $slug;
        $count = 1;

        while (
            static::where('slug', $slug)
                ->when($ignoreId, fn($q) => $q->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = $original . '-' . $count;
            $count++;
        }

        return $slug;
    }


    public function getRouteKeyName()
    {
        return 'slug';
    }



}
