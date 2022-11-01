<?php

namespace AAbosham\FilamentGeolocation;

use Filament\PluginServiceProvider;
use Spatie\LaravelPackageTools\Package;

class FilamentGeolocationServiceProvider extends PluginServiceProvider
{
    public static string $name = 'filament-geolocation';

    public function configurePackage(Package $package): void
    {
        $package->name(static::$name)
            ->hasTranslations()
            ->hasViews();
    }
}
