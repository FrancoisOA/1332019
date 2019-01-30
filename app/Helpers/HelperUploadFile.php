<?php
namespace Acciona\Helpers;

use Carbon\Carbon;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class HelperUploadFile
{
    public static function uploadFile(int $createdBy, $files, string $module, int $module_id, string $disk = 'fileServer'): array
    {
        $data = array();
        $createdAt = Carbon::now();
        foreach ($files as $i => $file)
        {
            $date = $createdAt->format('d-m-Y');
            $time = Carbon::now()->format('h.i.s.u A');
            if(!empty($file) && $file instanceof UploadedFile)
            {
                $fileOriginalName = $file->getClientOriginalName();
                $fileOriginalName = preg_replace('/\s+/', '_', $fileOriginalName);
                $fileExtension    = $file->getClientOriginalExtension();
                $fileName         = 'Acciona File ' . $date . ' at ' . $time . '.' . $fileExtension;
                $fileType         = $file->getMimeType();
                $fileSize         = $file->getSize();
                $path             = Storage::disk($disk)->putFileAs($module, $file, $fileName);
                if($path)
                {
                    $data_file = [
                        'name'          => $fileName,
                        'original_name' => $fileOriginalName,
                        'path'          => $path,
                        'url_preview'   => route('preview-file', [$module, $fileName]),
                        'url_download'  => route('download-file', [$module, $fileName]),
                        'mime_type'     => $fileType,
                        'extension'     => $fileExtension,
                        'size'          => $fileSize,
                        'module'        => $module,
                        'module_id'     => $module_id,
                        'created_by'    => $createdBy,
                        'created_at'    => $createdAt->format('Y-m-d h:m:s'),
                    ];
                    array_push($data, $data_file);
                }
            }
        }
        return $data;
    }

    public static function download(string $path, string $disk = 'fileServer')
    {
        $exist = Storage::disk($disk)->exists($path);
        if(!$exist)
            return "No existe el archivo!";

        $new_path = env('ROOT_FILE_SERVER') . '/' . $path;
        return response()->download($new_path);
    }
}