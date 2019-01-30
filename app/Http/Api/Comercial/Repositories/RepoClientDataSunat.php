<?php
namespace Acciona\Http\Api\Comercial\Repositories;

use Acciona\Http\Api\Comercial\Contracts\IClientDataSunat;

class RepoClientDataSunat implements IClientDataSunat
{
    private $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function save(array $params)
    {
        return $this->model->create($params);
    }

    public function findByRuc(string $number_ruc)
    {
        return $this->model->find($number_ruc);
    }
}