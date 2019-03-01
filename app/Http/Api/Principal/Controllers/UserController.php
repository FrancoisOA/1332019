<?php
namespace Acciona\Http\Api\Principal\Controllers;

use Acciona\Http\Api\Principal\Contracts\IUser;
use Acciona\Http\Controllers\Controller;

class UserController extends Controller
{
    protected $IUser;

    public function __construct(IUser $IUser)
    {
        $this->IUser = $IUser;
    }

    public function getAllUsers()
    {
        $data = $this->IUser->getUserByCargo(request()->all());
        return $this->responseSuccess($data);
    }

}