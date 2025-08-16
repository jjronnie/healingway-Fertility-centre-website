<?php

namespace App\Models;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
     protected $fillable = ['title', 'slug', 'icon', 'description', 'body'];

    protected static function booted()
    {
       static::creating(function ($service) {
            $service->slug = Str::slug($service->title, '-'); // lowercase, hyphens
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
