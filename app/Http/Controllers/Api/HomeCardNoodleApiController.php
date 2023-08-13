<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\HomeCardNoodle;
use App\Http\Requests\StoreHomeCardNoodleRequest;
use App\Http\Requests\UpdateHomeCardNoodleRequest;

class HomeCardNoodleApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return HomeCardNoodle::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHomeCardNoodleRequest $request)
    {
        if($request->hasFile('cardImg')) {
            $path = $request->file('cardImg')->store('uploads','public');
        }

        $homeCardNoodle = $request->all();
        $homeCardNoodle['cardImg'] = $path;

        HomeCardNoodle::create($homeCardNoodle);
    }

    /**
     * Display the specified resource.
     */
    public function show(HomeCardNoodle $homeCardNoodle)
    {
        return $homeCardNoodle;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHomeCardNoodleRequest $request, HomeCardNoodle $homeCardNoodle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HomeCardNoodle $homeCardNoodle)
    {
        //
    }
}
