<?php
namespace Acciona\Http\Api\Commercial\Repositories;

use Acciona\Http\Api\Commercial\Contracts\IUnitMeasure;

class RepoUnitMeasure implements IUnitMeasure
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->select('id as code', 'description')->orderBY('description')->get();
    }
}