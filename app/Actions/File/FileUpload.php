<?php

namespace App\Actions\File;

use Illuminate\Support\Facades\Storage;

class FileUpload
{
    public static function getUrl($path)
    {
        return url("uploads/$path");
    }
    public static function upload($file, $path)
    {
        $fileName = time() . '_' . $file->getClientOriginalName();
        $dist = public_path("uploads/$path");
        $file->move($dist, $fileName);

        return "$path/$fileName";
    }

    public static function uploadPrivateFile($file, $path)
    {
        $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        Storage::putFileAs("/$path", $file, $fileName);
        return "$path/" . $fileName;
    }
}
