<?php
namespace Acciona\Http\Api\Principal\Repositories;


use Acciona\Http\Api\Principal\Contracts\IConcept;

class RepoConcept implements IConcept
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function searchConcept(string $text)
    {
        $data = $this->model
                     ->selectRaw('conceptoid as code, v_descripcion as description')
                     ->onlyWithCodeSunat()
                     ->ofCompany(2)
                     ->where('v_descripcion', 'like', '%'.strtoupper($text).'%')
                     ->get();
        return $data->sortBy('v_descripcion');
    }
}