<?php
namespace Acciona\Http\Api\Base\Controllers;

use Acciona\Helpers\HelperUploadFile;
use Acciona\Http\Controllers\Controller;

class FileController extends Controller
{
    public function download(string $module, string $name_file)
    {
        $path = $module . '/' . $name_file;
        return HelperUploadFile::download($path);
    }

    public function preview()
    {

    }
}