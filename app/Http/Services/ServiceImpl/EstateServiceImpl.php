<?php

namespace App\Http\Services\ServiceImpl;

use App\Http\Services\MediaManagerService;
use App\Models\PrimeHomeEstate;
use Illuminate\Http\Request;
use App\Http\Services\EstateService;
use Illuminate\Support\Facades\Cache;


class EstateServiceImpl implements EstateService
{
    private  MediaManagerService $mediaManagerService;

    /**
     * @param MediaManagerService $mediaManagerService
     */
    public function __construct(MediaManagerService $mediaManagerService)
    {
        $this->mediaManagerService = $mediaManagerService;
    }

    public function storeEstate(Request $request): void
    {
        $estateImageUrl =  $this->mediaManagerService->uploadMedia($request->file("estateImage"));

        $estate = new PrimeHomeEstate;
        $estate->estate_title = $request->estateTitle;
        $estate->estate_description = $request->estateDescription;
        $estate->estate_price = $request->estatePrice;
        $estate->estate_image = $estateImageUrl;

        $estate->save();
    }

//    public function getEstates(): \Illuminate\Database\Eloquent\Collection
//    {
//        return PrimeHomeEstate::all();
//    }

    public function getEstates(): \Illuminate\Database\Eloquent\Collection
    {
        return Cache::rememberForever('all_estates_1', function () {
            return PrimeHomeEstate::all();
        });
    }
}
