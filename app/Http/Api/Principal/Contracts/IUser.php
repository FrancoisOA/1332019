<?php
namespace Acciona\Http\Api\Principal\Contracts;

interface IUser
{
    public function getUserByCargo(array $params);
}