<?php
namespace Acciona\Http\Api\Commercial\Controllers;

use Acciona\Http\Api\Commercial\Contracts\IClientDataSunat;
use Acciona\Http\Api\Commercial\Requests\ClientStoreRequest;
use Acciona\Http\Api\Commercial\Contracts\IClient;
use Acciona\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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

    public function store(ClientStoreRequest $request)
    {
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

    public function edit(int $idClient)
    {
        $data = $this->IClient->findOrFail($idClient);
        return $this->responseSuccess($data);
    }

    public function update(Request $request, int $id)
    {
        $error = null;
        $response = $request->all();
        $response['id'] = $id;
        $data = array_except($response, ['id', 'name', 'ruc']);
        try{
            $this->IClient->update($id, $data);
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

    public function assignedCommercial()
    {
        $error = null;
        $data = request()->all();
        $response = null;
        try{
            $this->IClient->update($data['id'], ['user_id' => $data['user_id']]);
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