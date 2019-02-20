<?php
namespace Acciona\Http\Api\Commercial\Repositories;

use Acciona\Http\Api\Commercial\Contracts\IClient;

class RepoClient implements IClient
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function create(array $params)
    {
        return $this->model->create($params);
    }

    public function update(int $id, array $params)
    {
        return $this->model->where('id', $id)->update($params);
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

    public function findOrFail(int $idClient)
    {
        return $this->model->selectRaw('id, type, name, contact, phone, email, address, ruc')->findOrFail($idClient);
    }
}