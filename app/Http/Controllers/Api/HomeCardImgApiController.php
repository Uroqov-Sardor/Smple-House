<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\HomeImgCards;
use App\Http\Requests\StoreHomeImgCardsRequest;
use App\Http\Requests\UpdateHomeImgCardsRequest;

class HomeCardImgApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return HomeImgCards::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHomeImgCardsRequest $request)
    {
        if($request->hasFile('cardImg')) {
            $path = $request->file('cardImg')->store('uploads','public');
        }

        $homeImgCard = $request->all();
        $homeImgCard['cardImg'] = $path;

        HomeImgCards::create($homeImgCard);
    }

    /**
     * Display the specified resource.
     */
    public function show(HomeImgCards $homeImgCards)
    {
        return $homeImgCards;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHomeImgCardsRequest $request, HomeImgCards $homeImgCards)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HomeImgCards $homeImgCards)
    {
        //
    }
}
