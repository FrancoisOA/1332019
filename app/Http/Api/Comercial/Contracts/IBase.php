<?php
namespace Acciona\Http\Api\Comercial\Contracts;

interface IBase
{
    public function findAll();
    public function save(array $params);
    public function update(int $id, array $params);
    public function delete(int $id);
}