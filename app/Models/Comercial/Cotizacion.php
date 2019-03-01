<?php
namespace Acciona\Models\Comercial;

use Acciona\Models\Principal\CliPro;
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

    public function getFEnviadoComercialAttribute($value)
    {
        if (!empty($value))
            return Carbon::parse($value)->format('d/m/Y');
        return null;
    }

    public function detalle()
    {
        return $this->hasOne(DetalleCotizacion::class, 'cotizacionid', 'cotizacionid');
    }

    public function commercial()
    {
        return $this->hasOne(CliPro::class, 'cli_proid', 'comercialid');
    }
}