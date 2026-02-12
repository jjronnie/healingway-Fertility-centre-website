<?php

namespace App\Providers;

use App\Models\Event;
use App\Models\GalleryImage;
use App\Models\Service;
use App\Models\Staff;
use Illuminate\Support\Facades\Event as EventFacade;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use Spatie\MediaLibrary\Conversions\Events\ConversionHasBeenCompletedEvent;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        EventFacade::listen(ConversionHasBeenCompletedEvent::class, function (ConversionHasBeenCompletedEvent $event) {
            $media = $event->media;
            $modelType = $media->model_type;

            if ($modelType === GalleryImage::class && $media->collection_name === 'gallery') {
                if ($event->conversion->getName() === 'webp') {
                    $image = GalleryImage::find($media->model_id);
                    if ($image && ! $image->is_ready) {
                        $image->is_ready = true;
                        $image->save();
                    }
                }

                $this->deleteOriginalAfterConversions($media);
            }

            if (in_array($modelType, [Staff::class, Service::class, Event::class], true) && $media->collection_name === 'photo') {
                $this->deleteOriginalAfterConversions($media);
            }
        });
    }

    protected function deleteOriginalAfterConversions($media): void
    {
        if (! config('media-library.delete_original_file_after_conversions', false)) {
            return;
        }

        $conversionNames = $media->getMediaConversionNames();

        if (empty($conversionNames)) {
            return;
        }

        foreach ($conversionNames as $conversionName) {
            if (! $media->hasGeneratedConversion($conversionName)) {
                return;
            }
        }

        $path = $media->getPathRelativeToRoot();

        if (! $path) {
            return;
        }

        if (Storage::disk($media->disk)->exists($path)) {
            Storage::disk($media->disk)->delete($path);
        }
    }
}
