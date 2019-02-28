<?php
namespace Acciona\Http\Api\Commercial\Repositories;

use Acciona\Http\Api\Commercial\Contracts\ICotizacion;

class RepoCotizacion implements ICotizacion
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function getCommercialTracking(array $params) {
        return $this->model
                    ->with(['detalle' => function($query){
                        $query->with(['dato' => function($query) {
                            $query->selectRaw('detalleid, v_cliente, v_contacto, v_via, v_tipo, v_incoterm, v_servicioid, v_text_obs_general');
                        }]);
                        $query->select('detalleid','cotizacionid','n_correlativo');
                    }])
                    ->selectRaw('cotizacionid, f_creacion')
                    ->whereIn('v_nombre', ['ENVIADO A PRICING','ENVIADO A COMERCIAL'])
                    ->get();
    }
}