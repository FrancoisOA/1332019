<?php
namespace Acciona\Http\Api\Comun\Providers;

use Acciona\Http\Api\Comun\Repositories\RepoCurrency;
use Acciona\Http\Api\Comun\Repositories\RepoIncoterm;
use Acciona\Http\Api\Comun\Repositories\RepoTypeIncoterm;
use Acciona\Http\Api\Comun\Repositories\RepoVia;
use Acciona\Models\Comun\Currency;
use Illuminate\Support\ServiceProvider;

class ServiceOrchestration extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('Acciona\Http\Api\Comun\Contracts\ICurrency', function (){
            return new RepoCurrency(new Currency);
        });
        $this->app->bind('Acciona\Http\Api\Comun\Contracts\IIncoterm', function (){
            return new RepoIncoterm();
        });
        $this->app->bind('Acciona\Http\Api\Comun\Contracts\ITypeIncoterm', function (){
            return new RepoTypeIncoterm();
        });
        $this->app->bind('Acciona\Http\Api\Comun\Contracts\IVia', function (){
            return new RepoVia();
        });
    }
}