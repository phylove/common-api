<?php

namespace Phy\CommonApi\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
use Phy\CoreApi\CallService;
use Route;

class LumenServiceProvider extends ServiceProvider
{

    public function boot()
    {
        // load
    }

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        
        if(env('USE_COMMON_ROUTES', true)){
            // load routes
            $this->loadRoutesFrom(__DIR__.'/../routes.php');

            // use routes middleware
            app()->routeMiddleware(['phy.auth' => \Phy\CommonApi\Middleware\ValidTokenUser::class]);
        }
    }
}
