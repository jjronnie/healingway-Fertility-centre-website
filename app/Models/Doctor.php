<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
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

        static::creating(function ($doctor) {
            $doctor->slug = $doctor->generateUniqueSlug($doctor->name);
        });

        static::updating(function ($doctor) {
            if ($doctor->isDirty('name')) { // Only regenerate slug if name changes
                $doctor->slug = $doctor->generateUniqueSlug($doctor->name);
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
