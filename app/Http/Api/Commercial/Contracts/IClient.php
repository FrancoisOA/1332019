<?php
namespace Acciona\Http\Api\Commercial\Contracts;

interface IClient
{
    public function findOrFail(int $idClient);

    public function create(array $params);

    public function update(int $id, array $params);

    public function getClientsByUser(int $user_id);

    public function exist(string $ruc);
}