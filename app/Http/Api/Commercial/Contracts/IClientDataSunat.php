<?php
namespace Acciona\Http\Api\Commercial\Contracts;


interface IClientDataSunat
{
    public function save(array $params);

    public function findByRuc(string $number_ruc);
}