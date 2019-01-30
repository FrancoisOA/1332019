<?php
namespace Acciona\Http\Api\Base\Repositories;

use Acciona\Http\Api\Base\Contracts\IFile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class RepoFile implements IFile
{
    private $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function all(): Collection
    {
        return $this->model->get();
    }

    public function create(array $params): Model
    {
        return $this->model->create($params);
    }

    public function update(int $id, array $params): bool
    {
        return $this->model->where('id', $id)->update($params);
    }

    public function delete(int $id): bool
    {
        $file = $this->model->find($id);
        if($file)
            return $file->delete();
        return false;
    }

    public function insert(array $data)
    {
        return $this->model->insert($data);
    }
}