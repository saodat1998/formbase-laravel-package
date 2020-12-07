<?php

namespace Saodat\FormBase;

use Illuminate\Support\ServiceProvider;
use Saodat\FormBase\Contracts\FormBuilderInterface;
use Saodat\FormBase\Console\FormMakeCommand;
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
        $this->commands(FormMakeCommand::class);
        $this->app->bind(FormBuilderInterface::class, FormBuilder::class);
    }
}
