<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ActorProduct;
use App\Models\BecomeSeller;
use App\Models\Collection;
use App\Models\Color;
use App\Models\CountryFlag;
use App\Models\Distributor;
use App\Models\ReplacementCycle;
use App\Models\Store;
use App\Models\StoreCity;
use App\Models\Style;
use App\Models\Type;
use Illuminate\Http\Request;

class DistributorController extends Controller
{
    public function index()
    {
        $distributors = Distributor::with('cities.phones')->get();
        $data =
        [
            'colors'        => Color::all(),
            'collections'   => Collection::all(),
            'actors'        => ActorProduct::all(),
            'types'         => Type::all(),
            'styles'        => Style::all(),
            'wear_cycles'   => ReplacementCycle::all(),
            'distributors'  => $distributors,
            'stores'        => Store::orderBy('order', 'Asc')->get(),
            'become_seller'         => BecomeSeller::first(),
            'cities'        => StoreCity::all(),
            'country_flag'  => CountryFlag::first()    

        ];
        return view('app.front-end.distributors.distributor', ['data' => $data]);
    }
}
