<?php

namespace App\Http\Services\ServiceImpl;

use App\Http\Services\MediaManagerService;
use Illuminate\Http\Request;

class CloudinaryServiceImpl implements MediaManagerService
{

    public function uploadMedia($file):string
    {
       return $uploadedFileUrl = cloudinary()->upload($file->getRealPath())->getSecurePath();

    }
}
