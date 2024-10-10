<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public $services = [
        \App\Services\Auth\IAuthService::class => \App\Services\Auth\AuthService::class,
        \App\Services\Area\IAreaService::class => \App\Services\Area\AreaService::class,
        \App\Services\Cctv\ICctvService::class => \App\Services\Cctv\CctvService::class,
        \App\Services\Setting\ISettingService::class => \App\Services\Setting\SettingService::class,
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        foreach ($this->services as $interface => $service) {
            $this->app->bind($interface, $service);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
