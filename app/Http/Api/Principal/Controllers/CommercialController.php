<?php
namespace Acciona\Http\Api\Principal\Controllers;

use Acciona\Http\Api\Principal\Contracts\IUser;
use Acciona\Http\Controllers\Controller;

class CommercialController extends Controller
{
    protected $IUser;

    public function __construct(IUser $IUser)
    {
        $this->IUser = $IUser;
    }

    public function getAllCommercials(int $companyId)
    {
        $data = $this->IUser->getAllCommercials($companyId);
        return $this->responseSuccess($data);
    }
}