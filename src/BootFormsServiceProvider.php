<?php

namespace Galahad\BootForms;

use Illuminate\Support\ServiceProvider;

class BootFormsServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBasicFormBuilder();
        $this->registerHorizontalFormBuilder();
        $this->registerBootForm();
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['bootform'];
    }

    protected function registerBasicFormBuilder()
    {
        $this->app->singleton('bootform.basic', function ($app) {
            return new BasicFormBuilder($app['adamwathan.form']);
        });
    }

    protected function registerHorizontalFormBuilder()
    {
        $this->app->singleton('bootform.horizontal', function ($app) {
            return new HorizontalFormBuilder($app['adamwathan.form']);
        });
    }

    protected function registerBootForm()
    {
        $this->app->singleton('bootform', function ($app) {
            return new BootForm($app['bootform.basic'], $app['bootform.horizontal']);
        });
    }
}
