<?php
namespace Acciona\Http\Api\Comercial\Contracts;


interface IClientDataSunat
{
    public function save(array $params);

    public function findByRuc(string $number_ruc);
}