<?php namespace Taskforcedev\LaravelSupport;

use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;
use Taskforcedev\LaravelSupport\Helpers\UI;
use Taskforcedev\LaravelSupport\Helpers\Composer;

class ServiceProvider extends IlluminateServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->config();
        $this->views();
    }

    private function config()
    {
        $this->publishes([
            __DIR__.'/config/taskforce-support.php' => config_path('taskforce-support.php'),
        ], 'taskforce-support');

        $this->mergeConfigFrom(
            __DIR__.'/config/taskforce-support.php',
            'taskforce-support'
        );

        // Merge overridden Config
        $published = __DIR__.'/../../../../config/taskforce-support.php';
        if (file_exists($published)) {
            $this->mergeConfigFrom(
                $published,
                'taskforce-support'
            );
        }
    }

    private function views()
    {
        $this->loadViewsFrom(__DIR__.'/views', 'taskforce-support');
    }

    public function register()
    {
        $this->app->bind('support.composer', Composer::class);
        $this->app->bind('support.ui', UI::class);
    }

    public function provides()
    {
        return [];
    }
}
