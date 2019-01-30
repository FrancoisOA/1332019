<?php
namespace Acciona\Http\Api\Comercial\Repositories;

use Acciona\Http\Api\Comercial\Contracts\IClientExtraData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class RepoClientExtraData implements IClientExtraData
{
    private $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function updateOrCreate(array $find, array $params)
    {
        return $this->model->updateOrCreate($find, $params);
    }
}