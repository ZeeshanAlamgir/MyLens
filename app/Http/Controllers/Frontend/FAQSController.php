<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
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

class FAQSController extends Controller
{
    public function create()
    {
        $data =
            [
                'colors'        => Color::all(),
                'collections'   => Collection::all(),
                'actors'        => ActorProduct::all(),
                'types'         => Type::all(),
                'styles'        => Style::all(),
                'wear_cycles'   => ReplacementCycle::all(),
                'banners'        => Banner::all(),
                'stores' => Store::orderBy('order', 'Asc')->get(),
                'become_seller'         => BecomeSeller::first(),
                'cities'        => StoreCity::all(),
                'country_flag'  => CountryFlag::first()    

            ];
        return view('app.front-end.faqs.index',compact('data'));
    }
}
