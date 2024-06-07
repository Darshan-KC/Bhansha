<?php

namespace App\Providers;

use App\Models\Image;
use App\Models\SiteConfig;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use App\View\Components\notification;
use App\Models\Contact;


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
        Schema::defaultStringLength(191);
        Paginator::useBootstrapFive();
        if (Schema::hasTable('images')) {
            $all_images = Image::query()->get();
            view()->share('all_images', $all_images);
        }

        if (Schema::hasTable('site_configs')) {
            $site_config = SiteConfig::query()->first();
            view()->share('site_config', $site_config);
        }
        if (Schema::hasTable('contacts')) {
            $contact = Contact::query()->first();
            view()->share('contact', $contact);
        }


    }
}
