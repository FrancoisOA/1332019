<?php
namespace Acciona\Http\Api\Principal\Repositories;

use Acciona\Http\Api\Principal\Contracts\IUser;

class RepoUser implements IUser
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function getUserByCargo(int $companyId, array $cargoIds)
    {
        return $this->model->selectCodeAndName()->getActives()->getByCargo($cargoIds)->byCompany($companyId)->get();
    }
}