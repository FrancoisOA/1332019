<?php
namespace Acciona\Http\Api\Principal\Controllers;

use Acciona\Http\Api\Principal\Contracts\ICliPro;
use Acciona\Http\Api\Principal\Contracts\IUser;
use Acciona\Http\Controllers\Controller;

class CommercialController extends Controller
{
    protected $ICliPro;

    public function __construct(ICliPro $ICliPro)
    {
        $this->ICliPro = $ICliPro;
    }

    public function getAllCommercials(int $companyId)
    {
        $data = $this->ICliPro->getCommercials($companyId);
        return $this->responseSuccess($data);
    }
}