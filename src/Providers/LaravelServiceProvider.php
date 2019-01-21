<?php

namespace Phy\CommonApi\Providers;

use Illuminate\Support\ServiceProvider;

class LaravelServiceProvider extends ServiceProvider
{

    public function boot()
    {
        // load
        $menuObject = service('getMenu');
        $menuObject->add(1, 'Home', url('/'), 'fa-dashboard', false, [
            $menuObject->addSubMenu(1, 'Dashboard', url('/'), 'fa-circle', false)
        ]);

        $menuObject->add(2, 'Kelola User', url('/'), 'fa-user', false, [
            $menuObject->addSubMenu(1, 'Daftar User', url('/manage-user'), 'fa-circle', false)
        ]);
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
            $this->app['router']->aliasMiddleware('phy.auth', \Phy\Core\Middleware\ValidTokenUser::class);
        }
    }
}