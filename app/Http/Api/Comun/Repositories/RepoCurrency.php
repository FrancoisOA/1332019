<?php
namespace Acciona\Http\Api\Comun\Repositories;

use Acciona\Http\Api\Comun\Contracts\ICurrency;

class RepoCurrency implements ICurrency
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model
                    ->selectRaw("monedaid as code, concat(c_abre, ' - ', v_descripcion) as description")
                    ->where('b_factura', true)
                    ->where('v_estado', 'ACTIVADO')
                    ->get();
    }
}