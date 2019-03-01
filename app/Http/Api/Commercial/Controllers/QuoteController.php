<?php
namespace Acciona\Http\Api\Commercial\Controllers;

use Acciona\Http\Api\Commercial\Contracts\ICotizacion;
use Acciona\Http\Api\Commercial\Contracts\IFactor;
use Acciona\Http\Api\Commercial\Contracts\IUnitMeasure;
use Acciona\Http\Api\Commercial\Requests\QuoteStoreRequest;
use Acciona\Http\Api\Comun\Contracts\ICurrency;
use Acciona\Http\Api\Comun\Contracts\IIncoterm;
use Acciona\Http\Api\Comun\Contracts\ITypeIncoterm;
use Acciona\Http\Api\Comun\Contracts\IVia;
use Acciona\Http\Api\Principal\Contracts\ICliPro;
use Acciona\Http\Api\Principal\Contracts\IUser;
use Acciona\Http\Controllers\Controller;

class QuoteController extends Controller
{
    protected $ICotizacion;
    protected $ICliPro;
    protected $IFactor;
    protected $IUnitMeasure;
    protected $ICurrency;
    protected $IUser;
    protected $IIncoterm;
    protected $ITypeIncoterm;
    protected $IVia;

    public function __construct(ICotizacion $ICotizacion,
                                ICliPro $ICliPro,
                                IFactor $IFactor,
                                IUnitMeasure $IUnitMeasure,
                                ICurrency $ICurrency,
                                IUser $IUser,
                                IIncoterm $IIncoterm,
                                ITypeIncoterm $ITypeIncoterm,
                                IVia $IVia)
    {
        $this->ITypeIncoterm= $ITypeIncoterm;
        $this->IUnitMeasure = $IUnitMeasure;
        $this->ICotizacion  = $ICotizacion;
        $this->IIncoterm    = $IIncoterm;
        $this->ICurrency    = $ICurrency;
        $this->IFactor      = $IFactor;
        $this->IUser        = $IUser;
        $this->IVia         = $IVia;
        $this->ICliPro      = $ICliPro;
    }

    public function create()
    {
        $request = request()->all();
        $factors         = $this->IFactor->all();
        $unitsOfMeasured = $this->IUnitMeasure->all();
        $currencies      = $this->ICurrency->all();
        $commercials     = $this->ICliPro->getCommercials($request['company_id']);
        $incoterms       = $this->IIncoterm->getAll();
        $typeIncoterms   = $this->ITypeIncoterm->getAll();
        $vias            = $this->IVia->getAll();
        $data = [
            'units_of_measured' => $unitsOfMeasured,
            'currencies'        => $currencies,
            'commercials'       => $commercials,
            'factors'           => $factors,
            'incoterms'         => $incoterms,
            'type_incoterms'    => $typeIncoterms,
            'vias'              => $vias,
        ];
        return $this->responseSuccess($data);
    }

    public function store(QuoteStoreRequest $request)
    {
        return $request->all();
    }

    public function reportCommercialTracking()
    {
        $data = $this->ICotizacion->getCommercialTracking(request()->all());
        return $this->responseSuccess($data);
    }
}