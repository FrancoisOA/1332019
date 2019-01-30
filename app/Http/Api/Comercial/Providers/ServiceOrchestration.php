<?php
namespace Acciona\Http\Api\Comercial\Providers;

use Acciona\Http\Api\Comercial\Repositories\RepoClientDataSunat;
use Acciona\Http\Api\Comercial\Repositories\RepoClientExtraData;
use Acciona\Http\Api\Comercial\Repositories\RepoComment;
use Acciona\Http\Api\Comercial\Repositories\RepoClient;

use Acciona\Models\Comercial\ClientDataSunat;
use Acciona\Models\Comercial\ClientExtraData;
use Acciona\Models\Comercial\Comment;
use Acciona\Models\Comercial\Client;

use Illuminate\Support\ServiceProvider;


class ServiceOrchestration extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('Acciona\Http\Api\Comercial\Contracts\IClient', function (){
            return new RepoClient(new Client);
        });

        $this->app->bind('Acciona\Http\Api\Comercial\Contracts\IComment', function (){
            return new RepoComment(new Comment);
        });

        $this->app->bind('Acciona\Http\Api\Comercial\Contracts\IClientDataSunat', function (){
            return new RepoClientDataSunat(new ClientDataSunat);
        });

        $this->app->bind('Acciona\Http\Api\Comercial\Contracts\IClientExtraData', function (){
            return new RepoClientExtraData(new ClientExtraData);
        });
    }
}