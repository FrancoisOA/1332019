<?php
namespace Acciona\Http\Api\Comercial\Contracts;

interface IClientExtraData
{
    public function updateOrCreate(array $find, array $params);
}