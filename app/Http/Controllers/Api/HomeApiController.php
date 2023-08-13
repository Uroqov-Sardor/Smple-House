<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Home;
use App\Http\Requests\StoreHomeRequest;
use App\Http\Requests\UpdateHomeRequest;

class HomeApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Home::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHomeRequest $request)
    {
        if($request->hasFile('cardImg')) {
            $path = $request->file('cardImg')->store('uploads','public');
        }

        $homeData = $request->all();
        $homeData['cardImg'] = $path;

        Home::create($homeData);
    }

    /**
     * Display the specified resource.
     */
    public function show(Home $home)
    {
        return $home;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHomeRequest $request, Home $home)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Home $home)
    {
        //
    }
}
