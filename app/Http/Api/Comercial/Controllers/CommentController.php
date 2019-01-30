<?php
namespace Acciona\Http\Api\Comercial\Controllers;

use Acciona\Http\Api\Comercial\Contracts\IComment;
use Acciona\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;

class CommentController extends Controller
{
    protected $IComment;

    public function __construct(IComment $IComment)
    {
        $this->IComment = $IComment;
    }

    public function store(Request $request)
    {
        $error = null;
        $response = null;
        try{
            $data = $request->all();
            $response = $this->IComment->save($data);
        }catch (Exception $e){
            $error = $e;
            Log::error($e->getMessage());
        }finally{
            if($error)
                return $this->responseError($error->getMessage(), 500);
            return $this->responseSuccess($response);
        }
    }

    public function update(Request $request, int $id)
    {
        $error = null;
        $response = null;
        try{
            $data = $request->all();
            $response = $this->IComment->update($id, $data);
        }catch (Exception $e){
            $error = $e;
            Log::error($e->getMessage());
        }finally{
            if($error)
                return $this->responseError($error->getMessage(), 500);
            return $this->responseSuccess($response);
        }
    }

    public function getCommentsByClient(int $id)
    {
        $data = $this->IComment->getCommentsByClient($id);
        return $this->responseSuccess($data);
    }

    public function getCommentsWithDatesByUser(int $user_id)
    {
        $data = $this->IComment->getCommentsWithDatesByUser($user_id);
        return $this->responseSuccess($data);
    }
}