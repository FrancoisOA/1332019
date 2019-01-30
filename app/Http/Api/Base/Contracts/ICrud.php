<?php
namespace Acciona\Http\Api\Base\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface ICrud
{
    public function all(): Collection;

    public function create(array $params): Model;

    public function update(int $id, array $params): bool;

    public function delete(int $id): bool;
}