<?php
namespace Acciona\Http\Api\Comun\Repositories;

use Acciona\Http\Api\Comun\Contracts\IIncoterm;

class RepoIncoterm implements IIncoterm
{

    public function getAll()
    {
        return [
            ['code' => 1, 'description' => 'CFR'],
            ['code' => 2, 'description' => 'CIF'],
            ['code' => 3, 'description' => 'CIP'],
            ['code' => 4, 'description' => 'CPT'],
            ['code' => 5, 'description' => 'DAP'],
            ['code' => 6, 'description' => 'DAF'],
            ['code' => 7, 'description' => 'DDP'],
            ['code' => 8, 'description' => 'DDU'],
            ['code' => 9, 'description' => 'DEQ'],
            ['code' => 10, 'description' => 'DES'],
            ['code' => 11, 'description' => 'EXW'],
            ['code' => 12, 'description' => 'FAS'],
            ['code' => 13, 'description' => 'FCA'],
            ['code' => 14, 'description' => 'FCAA'],
            ['code' => 15, 'description' => 'FCAE'],
            ['code' => 16, 'description' => 'FCAF'],
            ['code' => 17, 'description' => 'FCAP'],
            ['code' => 18, 'description' => 'FOB'],
            ['code' => 19, 'description' => 'DAT'],
        ];
    }
}