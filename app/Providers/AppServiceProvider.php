<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Observers\SiteObserver;
use App\Models\Site;
use Encore\Admin\Config\Config;
use Illuminate\Support\Facades\Schema;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Site::observe(SiteObserver::class);
        $table = config('admin.extensions.config.table', 'admin_config');
        if (Schema::hasTable($table)) {
            Config::load();
        }

    }
}
