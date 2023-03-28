<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCityRequest;
use App\Http\Requests\UpdateCityRequest;
use App\Http\Resources\CityResource;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'data' => CityResource::collection(City::all()),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCityRequest $request)
    {

        $city =  City::create($request->all());
        return response()->json([
            'data' => new CityResource($city)
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $city=City::find($id);

        return response()->json([
            'data' => new CityResource($city),
            'message'=> $city ? "get data successfully":"No Data Available"
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCityRequest $request, string $id)
    {
        if (! $city = City::find($id)) {
            return response()->json([
                'data' => [],
                'message'=>__('Not Found')
            ],404);
        }



        $city->update($request->all());
        return response()->json([
            'data' => new CityResource($city),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (! $city = City::find($id)) {
            return response()->json([
                'data' => [],
                'message'=>__('Not Found')
            ],404);
        }

        $city->delete();
        return response()->json([
            'message' => __('Deleted Successfully')
        ]);
    }
}
