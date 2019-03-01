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

    public function getUserByCargo(array $params)
    {
        return $this->model
                    ->selectCodeAndName()
                    ->getActives()
                    ->getByCargo($params['cargos'])
                    ->byCompany($params['company_id'])
                    ->get();
    }
}