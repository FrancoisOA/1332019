<?php
namespace Acciona\Http\Api\Principal\Repositories;

use Acciona\Http\Api\Principal\Contracts\IPort;

class RepoPort implements IPort
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function searchPorts(string $text)
    {
        return $this->model
                    ->join('comun.pais as country', 'country.paisid', '=', 'comun.puerto.paisid')
                    ->selectRaw("concat(comun.puerto.puertoid, '|', country.paisid) as code, concat(comun.puerto.v_descripcion, ', ', country.v_descripcion) as text, country.c_codigo as icon")
                    ->whereRaw("concat(comun.puerto.v_descripcion, ', ', country.v_descripcion) LIKE '%".strtoupper($text)."%'")
                    ->where('comun.puerto.v_estado', 'ACTIVADO')
                    ->orderBy('country.v_descripcion')
                    ->get()
                    ->map(function ($x){
                        $x->icon = route('preview-image', 'flags-mini/'.strtolower($x->icon).'.png');
                        return $x;
                    });
    }
}