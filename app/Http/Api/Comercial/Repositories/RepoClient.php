<?php
namespace Acciona\Http\Api\Comercial\Repositories;

use Acciona\Http\Api\Comercial\Contracts\IClient;

class RepoClient implements IClient
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function create($params)
    {
        return $this->model->create($params);
    }

    public function getClientsByUser(int $user_id)
    {
        return $this->model->with('extraData')->where('user_id', $user_id)->orderBy('id', 'desc')->get();
    }

    public function exist(string $ruc)
    {
        return $this->model->with(['user' => function($query){
            $query->select('usersid','v_correo as email','v_nombre as name','v_apellido_materno as firstLastName',
                           'v_apellido_paterno as secondLastName','v_telefono as phone', 'ciudadid as city_id');
        }])->select('user_id')
            ->where('ruc', $ruc)->first();
    }
}