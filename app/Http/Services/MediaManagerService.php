<?php

namespace App\Http\Services;

use Illuminate\Http\Request;

interface MediaManagerService
{
    public function uploadMedia($file);
}
