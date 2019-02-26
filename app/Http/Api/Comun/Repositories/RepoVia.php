<?php
namespace Acciona\Http\Api\Comun\Repositories;

use Acciona\Http\Api\Comun\Contracts\IVia;

class RepoVia implements IVia
{
    public function getAll()
    {
        return [
            ['code' => 1, 'description' => 'Aérea'],
            ['code' => 2, 'description' => 'Marítima'],
            ['code' => 3, 'description' => 'Multimodal'],
            ['code' => 4, 'description' => 'Terrestre'],
        ];
    }
}