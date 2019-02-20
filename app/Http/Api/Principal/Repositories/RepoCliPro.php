<?php

namespace Acciona\Http\Api\Principal\Repositories;

use Acciona\Http\Api\Principal\Contracts\ICliPro;

class RepoCliPro implements ICliPro
{
    private $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function searchClients(string $text)
    {
        $whereData = [
            ['v_estado', 'ACTIVADO'],
            ['b_cliente', true],
            ['v_razon_social', 'like', '%'.strtoupper($text).'%'],
        ];
        return $this->model
                    ->selectRaw('cli_proid as code, v_razon_social as name')
                    ->where($whereData)
                    ->get();
    }
}