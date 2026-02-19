<?php
namespace Linky\Tracker;

use Illuminate\Support\ServiceProvider;
use Linky\Tracker\Middleware\TrackVisit;
use Sadah\Linky\Services\LinkyClient;

class LinkyServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/linky.php', 'linky');

        $this->app->singleton(LinkyClient::class, function ($app) {
            return new LinkyClient();
        });
    }

    public function boot()
    {
        // نشر الإعدادات
        $this->publishes([
            __DIR__ . '/../config/linky.php' => $this->app->configPath('linky.php'),
        ], 'config');

        // تسجيل Middleware تلقائياً لكل web routes
        $this->app['router']->pushMiddlewareToGroup('web', TrackVisit::class);
    }
}
