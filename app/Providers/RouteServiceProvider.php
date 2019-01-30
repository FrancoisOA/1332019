<?php

namespace Acciona\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    protected $namespaceApiComercial = 'Acciona\Http\Api\Comercial\Controllers';
    protected $namespaceApiBase = 'Acciona\Http\Api\Base\Controllers';
    protected $namespaceExternalApi = 'Acciona\Http\ApiExternal\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiComercialWebRoutes();
        $this->mapApiComercialMobileRoutes();
        $this->mapApiBaseRoutes();
        $this->mapExternalApiRoutes();
    }

    protected function mapApiComercialWebRoutes()
    {
        Route::prefix('api-web')
            ->middleware('api')
            ->namespace($this->namespaceApiComercial)
            ->group(base_path('app/Http/Api/Comercial/Routes/api-web.php'));
    }

    protected function mapApiComercialMobileRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespaceApiComercial)
            ->group(base_path('app/Http/Api/Comercial/Routes/api-mobile.php'));
    }

    protected function mapExternalApiRoutes()
    {
        Route::prefix('api-external')
            ->middleware('api')
            ->namespace($this->namespaceExternalApi)
            ->group(base_path('app/Http/ApiExternal/routes.php'));
    }

    protected function mapApiBaseRoutes()
    {
        Route::prefix('api-base')
            ->middleware('api')
            ->namespace($this->namespaceApiBase)
            ->group(base_path('app/Http/Api/Base/Routes/routes.php'));
    }
}
