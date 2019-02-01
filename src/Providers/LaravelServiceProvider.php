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

        $menus = \App\Service\GetMenu::getInstance();
        $menus->add(1, 'Home', url('/'), 'fa fa-dashboard', true, [
            $menus->addSubMenu(1, 'Dashboard', url('/'), 'fa fa-circle', true)
        ]);

        $menus->add(2, 'User', url('/'), 'fa fa-user', true, [
            $menus->addSubMenu(1, 'Manage User', url('/manage-user'), 'fa fa-circle', 'viewUser')
        ]);

        if(env('USE_COMMON_ROUTES', true)){
            // load routes
            $this->loadRoutesFrom(__DIR__.'/../routes.php');

            // use routes middleware
            $this->app['router']->aliasMiddleware('valid.token', \Phy\CommonApi\Middleware\ValidTokenUser::class);
        }
    }
}