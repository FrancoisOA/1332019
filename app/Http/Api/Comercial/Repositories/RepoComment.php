<?php
namespace Acciona\Http\Api\Comercial\Repositories;

use Acciona\Http\Api\Comercial\Contracts\IComment;

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
}