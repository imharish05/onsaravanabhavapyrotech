<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\GlobalSetting;

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
     * Share global settings with all layout views automatically.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            try {
                $globalSetting = GlobalSetting::first();
            } catch (\Exception $e) {
                $globalSetting = null;
            }
            $view->with('globalSetting', $globalSetting);
        });
    }
}
