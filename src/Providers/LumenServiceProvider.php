<?php

namespace Phy\CommonApi\Providers;

use Illuminate\Support\ServiceProvider;

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

        $menus = \App\Service\GetMenu::getInstance();
        $menus->add(1, 'Home', url('/'), 'fa fa-dashboard', true, [
            $menus->addSubMenu(1, 'Dashboard', url('/'), 'fa fa-circle', true)
        ]);

        $menus->add(2, 'User', url('/'), 'fa fa-user', 'viewUser', [
            $menus->addSubMenu(1, 'Manage User', url('/manage-user'), 'fa fa-circle', true)
        ]);
        
        if(env('USE_COMMON_ROUTES', true)){
            // load routes
            $this->loadRoutesFrom(__DIR__.'/../routes.php');

            // use routes middleware
            app()->routeMiddleware(['phy.auth' => \Phy\CommonApi\Middleware\ValidTokenUser::class]);
        }
    }
}