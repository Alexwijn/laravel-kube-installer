<?php

namespace Alexwijn\KubeInstaller;

/**
 * Alexwijn\KubeInstaller\ServiceProvider
 */
class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/kubernetes.php' => config_path('kubernetes.php'),
            ]);

            $this->commands([
                Console\CompileCommand::class,
                Console\InitializeCommand::class,
                Console\InstallCommand::class,
            ]);
        }
    }

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/kubernetes.php', 'kubernetes'
        );
    }
}
