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
    protected $defer = true;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBasicFormBuilder()
            ->registerHorizontalFormBuilder()
            ->registerBootForm();
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'galahad.bootforms',
            'galahad.bootforms.basic',
            'galahad.bootforms.horizontal',
        ];
    }

    /**
     * @return $this
     */
    protected function registerBasicFormBuilder()
    {
        $this->app->singleton('galahad.bootforms.basic', function ($app) {
            return new BasicFormBuilder($app['galahad.form']);
        });

        return $this;
    }

    /**
     * @return $this
     */
    protected function registerHorizontalFormBuilder()
    {
        $this->app->singleton('galahad.bootforms.horizontal', function ($app) {
            return new HorizontalFormBuilder($app['galahad.form']);
        });

        return $this;
    }

    /**
     * @return $this
     */
    protected function registerBootForm()
    {
        $this->app->singleton('galahad.bootforms', function ($app) {
            return new BootForm($app['bootform.basic'], $app['bootform.horizontal']);
        });

        return $this;
    }
}
