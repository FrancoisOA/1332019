<?php
namespace Acciona\Models\Comercial;

use Acciona\Models\Users\User;
use Illuminate\Database\Eloquent\Model;

class DetalleCotizacion extends Model
{
    protected $table = 'comercial.tbl_detallecotizacion';
    protected $primaryKey = 'detalleid';

    public function dato()
    {
        return $this->hasOne(DatoCotizacion::class, 'detalleid', 'detalleid');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'usersid', 'usersid');
    }
}