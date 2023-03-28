<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCountryRequest;
use App\Http\Requests\UpdateCountryRequest;
use App\Http\Resources\CountryResource;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return response()->json([
            'data' => CountryResource::collection(Country::all()),
        ]);
    }


    public function countryCities($id)
    {

        return response()->json([
            'data' => CountryResource::collection(Country::where('id',$id)->with('cities')->get()),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCountryRequest $request)
    {

        $country =  Country::create($request->all());
        return response()->json([
            'data' => new CountryResource($country)
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         $country=Country::find($id);

        return response()->json([
            'data' => new CountryResource($country),
            'message'=> $country ? "get data successfully":"No Data Available"
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCountryRequest $request, string $id)
    {
        if (! $country = Country::find($id)) {
            return response()->json([
                'data' => [],
                'message'=>__('Not Found')
            ],404);
        }



        $country->update($request->all());
        return response()->json([
            'data' => new CountryResource($country),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (! $country = Country::find($id)) {
            return response()->json([
                'data' => [],
                'message'=>__('Not Found')
            ],404);
        }

        $country->delete();
        return response()->json([
            'message' => __('Deleted Successfully')
        ]);
    }
}
