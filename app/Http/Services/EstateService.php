<?php

namespace App\Http\Services;

use Illuminate\Http\Request;

interface EstateService
{
    public function storeEstate(Request $request);
    public function getEstates();
}
