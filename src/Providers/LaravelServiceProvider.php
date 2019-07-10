<?php

namespace Phy\CommonApi\Providers;

use Illuminate\Support\ServiceProvider;

class LaravelServiceProvider extends ServiceProvider
{

    public function boot()
    {
    
    }

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        
        // use routes middleware
        $this->app['router']->aliasMiddleware('phy.auth', \Phy\CommonApi\Middleware\ValidTokenUser::class);
        
        if(env('USE_COMMON_ROUTES', true)){
            // load routes
            $this->loadRoutesFrom(__DIR__.'/../routes.php');
        }
    }
}
