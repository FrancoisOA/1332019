<?php
namespace Acciona\Http\Api\Principal\Providers;

use Illuminate\Support\ServiceProvider;
use Acciona\Http\Api\Principal\Repositories\{RepoCliPro, RepoConcept, RepoPort, RepoUser};
use Acciona\Models\Users\User;
use Acciona\Models\Principal\
{
    CliPro,
    Concept,
    Port};

class ServiceOrchestration extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('Acciona\Http\Api\Principal\Contracts\ICliPro', function (){
            return new RepoCliPro(new CliPro);
        });
        $this->app->bind('Acciona\Http\Api\Principal\Contracts\IPort', function (){
            return new RepoPort(new Port);
        });
        $this->app->bind('Acciona\Http\Api\Principal\Contracts\IConcept', function (){
            return new RepoConcept(new Concept);
        });
        $this->app->bind('Acciona\Http\Api\Principal\Contracts\IUser', function (){
            return new RepoUser(new User);
        });
    }
}