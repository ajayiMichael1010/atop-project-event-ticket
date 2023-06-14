<?php

namespace App\Http\Controllers;

use App\Http\Services\EstateService;
use App\Models\PrimeHomeEstate;
use Illuminate\Http\Request;

class PrimeHomeEstateController extends Controller
{
    private EstateService $estateService;

    /**
     * @param EstateService $estateService
     */
    public function __construct(EstateService $estateService)
    {
        $this->estateService = $estateService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = "Estate Registration";
        return view("estate.create-estate-form", compact("pageTitle"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->estateService->storeEstate($request);
        return redirect('estate/create')->with('status', 'Estate added');
    }

    public function getEstates(){
       return $this->estateService->getEstates();
    }

    /**
     * Display the specified resource.
     */
    public function show(PrimeHomeEstate $primeHomeEstate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PrimeHomeEstate $primeHomeEstate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PrimeHomeEstate $primeHomeEstate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PrimeHomeEstate $primeHomeEstate)
    {
        //
    }
}
