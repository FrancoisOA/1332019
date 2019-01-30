<?php
namespace Acciona\Http\Api\Comercial\Controllers;

use Acciona\Http\Api\Comercial\Contracts\IClientDataSunat;
use Acciona\Http\Api\Comercial\Requests\ClientStoreRequest;
use Acciona\Http\Api\Comercial\Contracts\IClient;
use Acciona\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Exception;

class ClientController extends Controller
{
    protected $IClient;
    protected $IClientDataSunat;

    public function __construct(IClient $IClient, IClientDataSunat $IClientDataSunat)
    {
        $this->IClient = $IClient;
        $this->IClientDataSunat = $IClientDataSunat;
    }

    public function store(Request $request)
    {
        /*$this->validate($request,[
            'ruc' => 'required|unique:pgsql.comercial.clients',
        ]);*/
        $error = null;
        $response = null;
        try{
            $data = $request->all();
            $exist = $this->IClient->exist($data['ruc']);
            if(!$exist)
                $response = $this->IClient->create($data);
            else
                $response = $exist;
        }catch (Exception $e){
            $error = $e;
            Log::error($e->getMessage());
        }finally{
            if($error)
                return $this->responseError($error->getMessage(), 500);
            return $this->responseSuccess($response);
        }
    }

    public function getClientsByUser(int $id)
    {
        $data = $this->IClient->getClientsByUser($id);
        return $this->responseSuccess($data);
    }
}