<?php
namespace Acciona\Http\Api\Commercial\Controllers;

use Acciona\Exports\CustomerTrackingExport;
use Acciona\Http\Api\Commercial\Contracts\IComment;
use Acciona\Http\Controllers\Controller;
use Maatwebsite\Excel\Excel;

class ExportController extends Controller
{
    protected $IComment;
    protected $excel;

    public function __construct(Excel $excel, IComment $IComment)
    {
        $this->IComment = $IComment;
        $this->excel = $excel;
    }

    public function export()
    {
        $rangeDate = request()->all();
        $data = $this->IComment->reportCustomerTracking($rangeDate);
        return $this->excel->download(new CustomerTrackingExport($data), 'customer-tracking.xlsx', Excel::XLSX);
    }
}