<?php

namespace Acciona\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    protected $namespaceApiCommercial = 'Acciona\Http\Api\Commercial\Controllers';
    protected $namespaceApiPrincipal = 'Acciona\Http\Api\Principal\Controllers';
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
        $this->mapApiCommercialWebRoutes();
        $this->mapApiCommercialMobileRoutes();
        $this->mapApiPrincipalWebRoutes();
        $this->mapApiPrincipalMobileRoutes();
        $this->mapApiBaseRoutes();
        $this->mapExternalApiRoutes();
    }

    protected function mapApiCommercialWebRoutes()
    {
        Route::prefix('api-web')
            ->middleware('api')
            ->namespace($this->namespaceApiCommercial)
            ->group(base_path('app/Http/Api/Commercial/Routes/api-web.php'));
    }

    protected function mapApiCommercialMobileRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespaceApiCommercial)
            ->group(base_path('app/Http/Api/Commercial/Routes/api-mobile.php'));
    }

    protected function mapApiPrincipalWebRoutes()
    {
        Route::prefix('api-web')
            ->middleware('api')
            ->namespace($this->namespaceApiPrincipal)
            ->group(base_path('app/Http/Api/Principal/Routes/api-web.php'));
    }

    protected function mapApiPrincipalMobileRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespaceApiPrincipal)
            ->group(base_path('app/Http/Api/Principal/Routes/api-mobile.php'));
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
        Route::middleware('api')
            ->namespace($this->namespaceApiBase)
            ->group(base_path('app/Http/Api/Base/Routes/routes.php'));
    }
}
