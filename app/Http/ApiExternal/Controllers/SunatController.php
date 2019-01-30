<?php
namespace Acciona\Http\ApiExternal\Controllers;

use Acciona\Http\Api\Comercial\Contracts\IClientDataSunat;
use GuzzleHttp\Exception\RequestException;
use Acciona\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client;

class SunatController extends Controller
{
    private $IClientDataSunat;
    private $externalClient;

    public function __construct(IClientDataSunat $IClientDataSunat)
    {
        $this->externalClient = new Client();
        $this->IClientDataSunat = $IClientDataSunat;
    }

    public function search(string $numberDocument)
    {
        $error = null;
        $result = null;
        try{
            $exist = $this->IClientDataSunat->findByRuc(trim($numberDocument));
            Log::info($exist);
            if(!$exist){
                $response = $this->externalClient->get('https://api.sunat.cloud/ruc/'.$numberDocument);
                $data = $response->getBody()->getContents();
                $result = (object) json_decode($data, true);
                if($result){
                    $dataClient = [
                        'ruc' => $result->ruc,
                        'social_reason' => $result->razon_social,
                        'address' => $result->domicilio_fiscal,
                        'condition' => $result->contribuyente_condicion,
                        'status' => $result->contribuyente_estado,
                        'commercial_name' => $result->nombre_comercial
                    ];
                    $result = $this->IClientDataSunat->save($dataClient);
                }else{
                    $error = 'Error in external api.';
                }
            }else{
                $result = $exist;
            }
        }catch (RequestException $e){
            $error = $e;
            Log::error($e->getMessage());
        }finally{
            if($error)
                return $this->responseError($error->getMessage(), $error->getCode());
            return $this->responseSuccess($result);
        }
    }
}