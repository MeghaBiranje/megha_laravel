<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CountryModel;
use App\CountryStateModel;
use App\StateModel;
use App\CityModel;

class LocationController extends Controller
{
    public function allCountries(Request $request)
    {
        $countries=CountryModel::get()->all();
        return view('country',compact('countries'));
    }

    public function getCountry($id)
    {
        $obj = StateModel::where('country_id', $id)->get()->all();

        // return view('country', compact('obj'));	
        // $obj = CountryStateModel::join('country', 'country.id', 'country_state.country_id')
		// ->join('state', 'state.id', 'country_state.state_id')
		// ->select('state.*')
		// ->where('country.id', $id)
		// ->get()->all();
      // return view('country',compact('obj'));
		return json_encode($obj);
    }

    public function getState($id)
    {
        $obj = CityModel::where('state_id',$id)->get()->all();

        return json_encode($obj);
    }
}
