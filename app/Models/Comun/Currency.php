<?php
namespace Acciona\Models\Comun;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $table = 'comun.moneda';
    protected $primaryKey = 'monedaid';
}