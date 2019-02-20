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

    public function getAllCommercials(int $companyId)
    {
        return $this->model->selectCodeAndName()->getActives()->getCommercials()->byCompany($companyId)->get();
    }
}