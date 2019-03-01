<?php
namespace Acciona\Http\Api\Commercial\Controllers;

use Acciona\Exports\CommercialTrackingExport;
use Acciona\Exports\CustomerTrackingExport;
use Acciona\Http\Api\Commercial\Contracts\IComment;
use Acciona\Http\Api\Commercial\Contracts\ICotizacion;
use Acciona\Http\Controllers\Controller;
use Maatwebsite\Excel\Excel;

class ExportController extends Controller
{
    protected $ICotizacion;
    protected $IComment;
    protected $excel;

    public function __construct(Excel $excel, IComment $IComment, ICotizacion $ICotizacion)
    {
        $this->ICotizacion = $ICotizacion;
        $this->IComment = $IComment;
        $this->excel = $excel;
    }

    public function export()
    {
        $rangeDate = request()->all();
        $data = $this->IComment->reportCustomerTracking($rangeDate);
        return $this->excel->download(new CustomerTrackingExport($data), 'customer-tracking.xlsx', Excel::XLSX);
    }

    public function exportCommercialTracking()
    {
        $data = $this->ICotizacion->getCommercialTracking(request()->all());
        return $this->excel->download(new CommercialTrackingExport($data), 'commercial-tracking.xlsx', Excel::XLSX);
    }
}