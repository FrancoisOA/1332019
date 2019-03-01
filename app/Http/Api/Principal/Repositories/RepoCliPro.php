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

    public function getCommercials(int $company_Id)
    {
        $whereData = [
            ['v_estado', 'ACTIVADO'],
            ['b_comisionista', true],
            ['b_trabajador', true],
            ['companyid', $company_Id],
        ];
        return $this->model
                    ->select('cli_proid as code', 'v_razon_social as description')
                    ->where($whereData)
                    ->get();
    }
}