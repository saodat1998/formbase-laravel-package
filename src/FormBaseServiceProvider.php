<?php

namespace Saodat\FormBase;

use Illuminate\Support\ServiceProvider;
use Saodat\FormBase\Contracts\FormBuilderContract;
use Saodat\FormBase\Services\FormBuilder;

/**
 * Class FormBaseServiceProvider
 * @package Saodat\FormBase\Providers
 */
class FormBaseServiceProvider extends ServiceProvider
{

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->app->bind(FormBuilderContract::class, FormBuilder::class);
    }
}
