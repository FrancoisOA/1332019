<?php
namespace Acciona\Http\Api\Commercial\Providers;

use Acciona\Http\Api\Commercial\Repositories\RepoClientDataSunat;
use Acciona\Http\Api\Commercial\Repositories\RepoClientExtraData;
use Acciona\Http\Api\Commercial\Repositories\RepoComment;
use Acciona\Http\Api\Commercial\Repositories\RepoClient;

use Acciona\Http\Api\Commercial\Repositories\RepoCotizacion;
use Acciona\Http\Api\Commercial\Repositories\RepoFactor;
use Acciona\Http\Api\Commercial\Repositories\RepoUnitMeasure;
use Acciona\Models\Comercial\Cotizacion;
use Acciona\Models\Commercial\{ClientDataSunat, ClientExtraData, Comment, Client, Factor, UnitMeasure};

use Illuminate\Support\ServiceProvider;


class ServiceOrchestration extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('Acciona\Http\Api\Commercial\Contracts\IClient', function (){
            return new RepoClient(new Client);
        });

        $this->app->bind('Acciona\Http\Api\Commercial\Contracts\IComment', function (){
            return new RepoComment(new Comment);
        });

        $this->app->bind('Acciona\Http\Api\Commercial\Contracts\IClientDataSunat', function (){
            return new RepoClientDataSunat(new ClientDataSunat);
        });

        $this->app->bind('Acciona\Http\Api\Commercial\Contracts\IClientExtraData', function (){
            return new RepoClientExtraData(new ClientExtraData);
        });

        $this->app->bind('Acciona\Http\Api\Commercial\Contracts\IFactor', function (){
            return new RepoFactor(new Factor);
        });

        $this->app->bind('Acciona\Http\Api\Commercial\Contracts\IUnitMeasure', function (){
            return new RepoUnitMeasure(new UnitMeasure);
        });

        $this->app->bind('Acciona\Http\Api\Commercial\Contracts\ICotizacion', function (){
            return new RepoCotizacion(new Cotizacion);
        });
    }
}