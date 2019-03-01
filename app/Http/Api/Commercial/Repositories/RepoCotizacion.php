<?php
namespace Acciona\Http\Api\Commercial\Repositories;

use Acciona\Http\Api\Commercial\Contracts\ICotizacion;
use Illuminate\Support\Facades\DB;

class RepoCotizacion implements ICotizacion
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function getCommercialTracking(array $params) {
        $user_id       = $params['user_id'];
        $commercial_id = $params['commercial_id'];
        $dateRange     = $params['dateRange'];

        $query = "select distinct cot.f_creacion,
               CONCAT(dat.v_servicioid, lpad((EXTRACT(MONTH FROM cot.f_creacion))::text, 2, '0'::text), EXTRACT(YEAR FROM cot.f_creacion), '-', det.n_correlativo) as code,
               cot.f_enviado_comercial, concat(u.v_nombre, ' ', u.v_apellido_paterno, ' ', u.v_apellido_materno) as user_name,
               com.v_razon_social as commercial, dat.v_cliente as client, dat.v_contacto as contact,
               dat.v_via as via,
               CASE WHEN dat.n_via = '2' THEN dat.v_tipo ELSE '' END as type, dat.v_text_obs_general as observations
        from comercial.tbl_cotizacion as cot
        inner join comercial.tbl_detallecotizacion as det
        on cot.cotizacionid = det.cotizacionid
        inner join comercial.tbl_datoscotizacion as dat
        on det.detalleid = dat.detalleid
        inner join users.users as u
        on det.usersid = u.usersid
        inner join principal.cli_pro as com
        on cot.comercialid = com.cli_proid
        where cot.v_nombre in ('ENVIADO A PRICING', 'ENVIADO A COMERCIAL')";

        if ($commercial_id) {
            $query .= " AND cot.comercialid = ".$commercial_id;
        }

        if ($user_id) {
            $query .= " AND det.usersid = ".$user_id;
        }

        if (empty($commercial_id) && empty($user_id)) {
            $query .= " AND cot.f_creacion  BETWEEN '" . $dateRange[0] . "' AND '" . $dateRange[1] ."'";
        }

        $query .= " order by cot.f_creacion desc";

        return DB::select($query);
    }
}