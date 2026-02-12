<?php

namespace App\Support\Media;

use App\Models\Event;
use App\Models\GalleryImage;
use App\Models\Service;
use App\Models\Staff;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\Support\PathGenerator\PathGenerator;

class OrganizedPathGenerator implements PathGenerator
{
    public function getPath(Media $media): string
    {
        return $this->basePath($media);
    }

    public function getPathForConversions(Media $media): string
    {
        return $this->basePath($media) . 'conversions/';
    }

    public function getPathForResponsiveImages(Media $media): string
    {
        return $this->basePath($media) . 'responsive-images/';
    }

    protected function basePath(Media $media): string
    {
        $folder = $this->resolveFolder($media);
        $modelId = $media->model_id ?? 'unknown';

        return "{$folder}/{$modelId}/";
    }

    protected function resolveFolder(Media $media): string
    {
        if (! $media->model_type) {
            return 'media';
        }

        $map = [
            GalleryImage::class => 'gallery',
            Event::class => 'events',
            Service::class => 'services',
            Staff::class => 'staff',
        ];

        if (isset($map[$media->model_type])) {
            return $map[$media->model_type];
        }

        return Str::kebab(Str::pluralStudly(class_basename($media->model_type)));
    }
}
