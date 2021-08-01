<?php

namespace App\Providers;

use Illuminate\Support\Carbon;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        setlocale(LC_TIME, 'id_ID.UTF-8');
        Carbon::setLocale('id_ID.UTF-8');
        require_once base_path('app') . '/Helpers/ApiHelper.php';
    }
}
