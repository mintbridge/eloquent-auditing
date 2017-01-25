<?php

namespace Mintbridge\EloquentAuditing;

use Illuminate\Support\ServiceProvider;
use Mintbridge\EloquentAuditing\Auditor;

class AuditServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     */
    public function boot()
    {
        // Publish a config file
        $this->publishes([
            __DIR__.'/config/auditing.php' => config_path('auditing.php'),
        ], 'config');

        // Publish migrations
        $this->loadMigrationsFrom(__DIR__.'/migrations');
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->app->bind(
            'auditor',
            Auditor::class
        );
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['auditor'];
    }
}
