<?php

namespace Acciona\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'principal.cli_pro';
    protected $primaryKey = 'cli_prodid';
}
