<?php
namespace Acciona\Http\Api\Commercial\Repositories;

use Acciona\Http\Api\Commercial\Contracts\IClientExtraData;

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