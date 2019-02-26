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
        $text    = request()->get('text');
        $port    = request()->get('port');
        $data    = $this->IPort->searchPorts($text, $port);
        return $this->responseSuccess($data);
    }
}