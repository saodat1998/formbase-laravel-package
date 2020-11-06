<?php

namespace Saodat\FormBase;

use Illuminate\Support\ServiceProvider;
use Saodat\FormBase\Contracts\FormBuilderInterface;

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
        $this->app->bind(FormBuilderInterface::class, FormBuilder::class);
    }
}
