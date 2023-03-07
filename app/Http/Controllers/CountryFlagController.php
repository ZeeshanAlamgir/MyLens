<?php

namespace App\Http\Controllers;

use App\Models\CountryFlag;
use Illuminate\Http\Request;

class CountryFlagController extends Controller
{
    public function updateCountryFlag(Request $request)
    {
        $country_flag = (new CountryFlag())->first();
        if(is_null($country_flag))
        {
            $country_flg = (new CountryFlag());
            $country_flg->country_flag = $request['flag'];
            $country_flg->save();
        }
        else
        {
            $country_flag->country_flag = $request['flag'];
            $country_flag->save();
        }
    }
}
