<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CountryResource;
use App\Country;

use Illuminate\Http\Request;
use App\Http\Resources\StateResource;
use App\Http\Resources\CityResource;

class CountryController extends Controller
{
    public function index()
    {
       return CountryResource::collection(Country::paginate(15));
   
    }
    public function showState($id){
        $country=Country::find($id);
        
        return StateResource::collection($country->states);
    }



    public function showCity($id){
        $country=Country::find($id);
        
        return CityResource::collection($country->cities);
    }
}
