<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{

     use HasFactory;
     protected $fillable = [
        'name',
        'position',
        'body',
        'photo',
        'slug',
         'display_position',
    ];


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
