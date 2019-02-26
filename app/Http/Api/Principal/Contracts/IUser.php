<?php
namespace Acciona\Http\Api\Principal\Contracts;

interface IUser
{
    public function getUserByCargo(int $companyId, array $cargoIds);
}