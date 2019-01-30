<?php
namespace Acciona\Http\Api\Base\Providers;

use Acciona\Http\Api\Base\Repositories\{
    RepoFile
};

use Acciona\Models\Base\{
    File
};

use Illuminate\Support\ServiceProvider;


class ServiceOrchestration extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('Acciona\Http\Api\Base\Contracts\IFile', function (){
            return new RepoFile(new File);
        });
    }
}