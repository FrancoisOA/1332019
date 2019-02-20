<?php
namespace Acciona\Http\Api\Principal\Controllers;

use Acciona\Http\Api\Principal\Contracts\ICliPro;
use Acciona\Http\Controllers\Controller;

class CliProController extends Controller
{
    private $ICliPro;

    public function __construct(ICliPro $ICliPro)
    {
        $this->ICliPro = $ICliPro;
    }

    public function searchClients()
    {
        $data = $this->ICliPro->searchClients(request()->get('text'));
        return $this->responseSuccess($data);
    }
}