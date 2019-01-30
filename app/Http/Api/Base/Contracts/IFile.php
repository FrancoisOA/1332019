<?php
namespace Acciona\Http\Api\Base\Contracts;

interface IFile extends ICrud
{
    public function insert(array $data);
}