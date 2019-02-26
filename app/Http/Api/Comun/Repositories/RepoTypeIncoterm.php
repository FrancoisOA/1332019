<?php
namespace Acciona\Http\Api\Comun\Repositories;

use Acciona\Http\Api\Comun\Contracts\ITypeIncoterm;

class RepoTypeIncoterm implements ITypeIncoterm
{

    public function getAll()
    {
        return [
            ['code' => 1, 'description' => 'FCL'],
            ['code' => 2, 'description' => 'LCL'],
            ['code' => 3, 'description' => 'RoRo'],
            ['code' => 4, 'description' => 'Break Bulk'],
            ['code' => 5, 'description' => 'Granel'],
        ];
    }
}