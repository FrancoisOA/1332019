<?php
namespace Acciona\Http\Api\Comercial\Controllers;

use Acciona\Helpers\HelperUploadFile;
use Acciona\Http\Api\Base\Contracts\IFile;
use Acciona\Http\Api\Comercial\Contracts\IComment;
use Acciona\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class FileCommentController extends Controller
{
    private $IFile;
    private $IComment;

    public function __construct(IFile $IFile, IComment $IComment)
    {
        $this->IFile = $IFile;
        $this->IComment = $IComment;
    }

    public function store(Request $request)
    {
        return DB::transaction(function () use($request) {
            $error = '';
            $comment = array();
            try{
                $params = $request->all();
                $comment = $this->IComment->save([
                    'icon'      => '',
                    'type'      => 'file',
                    'comment'   => '',
                    'user_id'   => $params['user_id'],
                    'client_id' => $params['customer_id']
                ]);
                if($comment)
                {
                    $dataFiles = HelperUploadFile::uploadFile($params['user_id'], $params['files'], 'customer-tracking', $comment->id);
                    Log::info('Lista de Archivos a guardar', $dataFiles);
                    if(count($dataFiles) > 0)
                    {
                        $this->IFile->insert($dataFiles);
                    }
                    $comment['files'] = $dataFiles;
                }
            }catch (Exception $e){
                Log::error($e);
                $error = $e->getMessage();
            }finally{
                if($error)
                    return $this->responseError($error, 500);
                return $this->responseSuccess($comment);
            }
        });
    }
}