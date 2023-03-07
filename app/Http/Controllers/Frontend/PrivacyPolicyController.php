<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ActorProduct;
use App\Models\Banner;
use App\Models\BecomeSeller;
use App\Models\Collection;
use App\Models\Color;
use App\Models\CountryFlag;
use App\Models\ReplacementCycle;
use App\Models\Store;
use App\Models\StoreCity;
use App\Models\Style;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PrivacyPolicyController extends Controller
{
    public function create() :View
    {
        $data =
        [
            'colors'        => Color::all(),
            'collections'   => Collection::all(),
            'actors'        => ActorProduct::all(),
            'types'         => Type::all(),
            'styles'        => Style::all(),
            'wear_cycles'   => ReplacementCycle::all(),
            'banner'        => Banner::all(),
            'stores'        => Store::orderBy('order', 'Asc')->get(),
            'become_seller'         => BecomeSeller::first(),
            'cities'        => StoreCity::all(),
            'country_flag'  => CountryFlag::first()    

        ];
        return view('app.front-end.privacy-policy.index',compact('data'));
    }
}
