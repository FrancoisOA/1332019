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

    public function searchPorts(string $text, int $port = null)
    {
        $query = $this->model
                    ->join('comun.pais as country', 'country.paisid', '=', 'comun.puerto.paisid')
                    ->selectRaw("country.paisid as country, comun.puerto.puertoid as port, concat(comun.puerto.v_descripcion, ', ', country.v_descripcion) as text, country.c_codigo as icon")
                    ->whereRaw("concat(comun.puerto.v_descripcion, ', ', country.v_descripcion) LIKE '%".strtoupper($text)."%'")
                    ->where('comun.puerto.v_estado', 'ACTIVADO');

        if($port && $port > 0)
        {
            $query->where("comun.puerto.puertoid", '!=', $port);
        }

        return $query->orderBy('country.v_descripcion')
                     ->get()
                     ->map(function ($x){
                         $x->icon = route('preview-file', ['flags-mini', strtolower($x->icon).'.png']);
                         return $x;
                     });
    }
}