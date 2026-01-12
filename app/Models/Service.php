<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use RalphJSmit\Laravel\SEO\Support\SEOData;
use RalphJSmit\Laravel\SEO\SchemaCollection;
use App\Services\SitemapService;
use RalphJSmit\Laravel\SEO\SchemaTypes\MedicalProcedure;
use RalphJSmit\Laravel\SEO\SchemaTypes\MedicalClinic;

class Service extends Model
{
    use HasFactory, HasSEO;

    protected $fillable = [
        'name',
        'slug',
        'photo',
        'icon',
        'desc',
        'body'
    ];

    protected static function booted()
    {
        static::saving(function ($service) {
            if ($service->isDirty('name') || empty($service->slug)) {
                $service->slug = Str::slug($service->name);
            }
        });

        static::created(function () {
            SitemapService::update();
        });

        static::updated(function () {
            SitemapService::update();
        });

        static::deleted(function () {
            SitemapService::update();
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }




    /**
     * Get the SEO data for this service
     */
     public function getDynamicSEOData(): SEOData
    {
        $description = $this->desc;

        
        // Get the absolute URL for the service
        $url = route('service.show', $this->slug);
        
        // Get the photo URL if available
        $imageUrl = $this->photo ? asset('storage/' . $this->photo) : asset('assets/img/1.webp');

        return new SEOData(
            title: $this->name . ' - HealingWay Fertility Centre',
            description: $description,
            author: 'HealingWay Fertility Centre',
            image: $imageUrl,
            url: $url,
            enableTitleSuffix: true,
            site_name: 'HealingWay Fertility Centre',
            locale: 'en_UG',
            canonical_url: $url,
        );
    }
}
