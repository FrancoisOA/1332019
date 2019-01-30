<?php
namespace Acciona\Http\Traits;

trait Response
{
    private function response(bool $status, $data, $message = '', $code = 200)
    {
        $response = ['status' => $status];

        if($status)
            $response['data'] = $data;
        else
            $response['message'] = $message;

        return response()->json($response, $code);
    }

    protected function responseSuccess($data)
    {
        return $this->response(true, $data);
    }

    protected function responseError(string $message, int $code)
    {
        return $this->response(false, null, $message, $code);
    }
}