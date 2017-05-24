<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Pago;

class PagosProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function($view){
            $view->with('recaudacion_dia', Pago::recaudacion_dia());
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
