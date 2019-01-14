<?php

namespace Phy\CommonApi;

use Illuminate\Support\ServiceProvider;

class CommonApiServiceProvider extends ServiceProvider
{

    public function boot()
    {
        require_once __DIR__.'/../helpers/define.php';
    }

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {

        // load routes
        $this->loadRoutesFrom(__DIR__.'/../routes.php');
    }
}