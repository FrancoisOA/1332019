<?php
namespace Acciona\Http\Api\Commercial\Repositories;

use Acciona\Http\Api\Commercial\Contracts\IComment;

class RepoComment implements IComment
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function getClassName(): string
    {
        return get_class($this->model);
    }

    public function findAll()
    {
        return $this->model->all();
    }

    public function save(array $params)
    {
        return $this->model->create($params);
    }

    public function update(int $id, array $params)
    {
        return $this->model->where('id', $id)->update($params);
    }

    public function delete(int $id)
    {
        // TODO: Implement delete() method.
    }

    public function getCommentsByClient(int $client_id)
    {
        return $this->model->with('files')->where('client_id', $client_id)->get();
    }

    public function getCommentsWithDatesByUser(int $user_id)
    {
        return $this->model->where('user_id', $user_id)->whereNotNull('date')->get();
    }

    public function reportCustomerTracking(array $rangeDate) {
        return $this->model
                    ->selectRaw("commercial.comments.created_at, c.type as type_client, c.name as client,
                                 concat(u.v_apellido_paterno, ' ', u.v_apellido_materno, '', u.v_nombre) as commercial,
                                 commercial.comments.date, commercial.comments.hour,
                                 commercial.comments.type as type_register")
                    ->join('users.users as u', 'commercial.comments.user_id', '=', 'u.usersid')
                    ->join('commercial.clients as c', 'commercial.comments.client_id', '=', 'c.id')
                    ->whereNotNull('commercial.comments.date')
                    ->whereIn('commercial.comments.type', ['cite', 'call'])
                    ->whereBetween('commercial.comments.created_at', $rangeDate)
                    ->get();
    }
}