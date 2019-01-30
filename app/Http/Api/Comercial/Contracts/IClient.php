<?php
namespace Acciona\Http\Api\Comercial\Contracts;

interface IClient
{
    public function create($params);

    public function getClientsByUser(int $user_id);

    public function exist(string $ruc);
}