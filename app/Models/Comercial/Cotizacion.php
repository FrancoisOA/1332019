<?php
namespace Acciona\Models\Comercial;

use Acciona\Models\Users\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    protected $table = 'comercial.tbl_cotizacion';
    protected $primaryKey = 'cotizacionid';

    public function getFCreacionAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function detalle()
    {
        return $this->hasOne(DetalleCotizacion::class, 'cotizacionid', 'cotizacionid');
    }

    public function user()
    {
        return $this->hasOne(User::class, '', '');
    }
}