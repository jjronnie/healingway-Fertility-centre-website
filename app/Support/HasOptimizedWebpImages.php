<?php

namespace App\Support;

use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

trait HasOptimizedWebpImages
{
    public function registerOptimizedWebpConversions(?Media $media = null): void
    {
        $this->addMediaConversion('webp')
            ->format('webp')
            ->quality(80)
            ->fit(Fit::Max, 1200, 1200)
            ->performOnCollections('photo');

        $this->addMediaConversion('thumb')
            ->format('webp')
            ->quality(75)
            ->fit(Fit::Crop, 400, 400)
            ->performOnCollections('photo');
    }
}
