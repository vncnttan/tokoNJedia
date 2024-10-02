<?php

namespace App\Providers;

use App\View\Components\profile\ProfileLocation;
use App\View\Components\profile\ProfileTransaction;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class ComponentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Change precedence when Blade template calls several components.
        // This will cause Blade template calls for Component classes first and Blade components comes second.
        Blade::component(ProfileTransaction::class, 'profile.profile-transaction');
        Blade::component(ProfileLocation::class, 'profile.profile-location');
    }
}
