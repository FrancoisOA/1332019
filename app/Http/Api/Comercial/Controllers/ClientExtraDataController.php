<?php
namespace Acciona\Http\Api\Comercial\Controllers;

use Acciona\Http\Api\Comercial\Contracts\IClientExtraData;
use Acciona\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Exception;

class ClientExtraDataController extends Controller
{
    protected $IClientExtraData;

    public function __construct(IClientExtraData $IClientExtraData)
    {
        $this->IClientExtraData = $IClientExtraData;
    }

    public function store(Request $request)
    {
        $error = null;
        $response = null;
        try{
            $data = $request->all();
            $response = $this->IClientExtraData->updateOrCreate(['client_id' => $data['client_id']], $data);
        }catch (Exception $e){
            $error = $e;
            Log::error($e->getMessage());
        }finally{
            if($error)
                return $this->responseError($error->getMessage(), 500);
            return $this->responseSuccess($response);
        }
    }
}