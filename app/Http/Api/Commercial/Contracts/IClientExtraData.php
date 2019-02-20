<?php
namespace Acciona\Http\Api\Commercial\Contracts;

interface IClientExtraData
{
    public function updateOrCreate(array $find, array $params);
}