<?php

namespace App\Services;

use App\Models\Staff;
use App\Models\Service;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class SitemapService
{
    /**
     * Generate and save the sitemap
     */
   public static function generate(): string
{
    $sitemap = Sitemap::create();

    self::addStaticPages($sitemap);
    self::addServices($sitemap);
    self::addStaff($sitemap);

    return $sitemap->render();
}


    /**
     * Add static pages to sitemap
     */
    private static function addStaticPages(Sitemap $sitemap): void
    {
        // Home page - highest priority
        $sitemap->add(
            Url::create(route('home'))
                ->setLastModificationDate(now())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                ->setPriority(1.0)
        );

        // About page
        $sitemap->add(
            Url::create(route('about-us'))
                ->setLastModificationDate(now())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                ->setPriority(0.8)
        );

        // Services listing page
        $sitemap->add(
            Url::create(route('our-services'))
                ->setLastModificationDate(now())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                ->setPriority(0.9)
        );

        // Team listing page
        $sitemap->add(
            Url::create(route('our-team'))
                ->setLastModificationDate(now())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                ->setPriority(0.8)
        );

        // Contact page
        $sitemap->add(
            Url::create(route('contact-us'))
                ->setLastModificationDate(now())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                ->setPriority(0.7)
        );
    }

    /**
     * Add service pages to sitemap
     */
    private static function addServices(Sitemap $sitemap): void
    {
        Service::all()->each(function (Service $service) use ($sitemap) {
            $sitemap->add(
                Url::create(route('service.show', $service->slug))
                    ->setLastModificationDate($service->updated_at)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                    ->setPriority(0.85) // High priority for services
            );
        });
    }

    /**
     * Add Staff pages to sitemap
     */
    private static function addStaff(Sitemap $sitemap): void
    {
        Staff::all()->each(function (Staff $staff) use ($sitemap) {
            $sitemap->add(
                Url::create(route('staff.show', $staff->slug))
                    ->setLastModificationDate($staff->updated_at)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                    ->setPriority(0.7)
            );
        });
    }
}