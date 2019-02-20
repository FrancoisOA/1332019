<?php
namespace Acciona\Http\Api\Principal\Controllers;

use Acciona\Http\Api\Principal\Contracts\IPort;
use Acciona\Http\Controllers\Controller;

class PortController extends Controller
{
    protected $IPort;

    public function __construct(IPort $IPort)
    {
        $this->IPort = $IPort;
    }

    public function searchPorts()
    {
        $data = $this->IPort->searchPorts(request()->get('text'));
        return $this->responseSuccess($data);
    }
}