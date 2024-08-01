<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\CityResource;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $city = City::withCount('officeSpaces')->get();
        return CityResource::collection($city);
    }

    public function show(City $city)
    {
        $city->load('officeSpaces.city', 'officeSpaces.photos');
        $city->loadCount('officeSpaces');
        return new CityResource($city);
    }
}
