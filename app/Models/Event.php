<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Event extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'summary',
        'body',
        'featured_image',
        'venue',
        'event_date',
        'event_time',
        'status',
        'created_by',
    ];

    protected $casts = [
    'event_date' => 'date',       
    'event_time' => 'datetime:H:i', 
];


    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    protected static function booted()
    {
        static::creating(function ($event) {
            $event->slug = self::generateUniqueSlug($event->title);
        });

        static::updating(function ($event) {
            if ($event->isDirty('title')) {
                $event->slug = self::generateUniqueSlug(
                    $event->title,
                    $event->id
                );
            }
        });
    }


    private static function generateUniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $slug = Str::slug($title);
        $original = $slug;
        $count = 1;

        while (
            self::where('slug', $slug)
            ->when($ignoreId, fn($q) => $q->where('id', '!=', $ignoreId))
            ->exists()
        ) {
            $slug = $original . '-' . $count++;
        }

        return $slug;
    }


      public function getRouteKeyName()
    {
        return 'slug';
    }
}
