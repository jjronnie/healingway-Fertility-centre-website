<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use Illuminate\Support\Facades\Cache;




class Service extends Model
{
    use HasFactory, HasSEO;

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


    protected function syncSeo(): void
    {
        $this->seo()->updateOrCreate(
            [],
            [
                'title' => $this->name,
                'description' => $this->desc,
                'image' => $this->photo
                    ? asset('storage/' . $this->photo)
                    : asset('assets/img/1.webp'),
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
