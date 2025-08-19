<?php

namespace App\Models;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
      protected $fillable = [
        'name', 'slug', 'photo', 'icon', 'desc', 'body'
    ];

    protected static function booted()
    {
      static::saving(function ($service) {
        if ($service->isDirty('name') || empty($service->slug)) {
            $service->slug = Str::slug($service->name);
        }
    });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
