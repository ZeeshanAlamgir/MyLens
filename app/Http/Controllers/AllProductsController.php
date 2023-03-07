<?php

namespace App\Http\Controllers;

use App\Models\ActorProduct;
use App\Models\BecomeSeller;
use App\Models\Collection;
use App\Models\Color;
use App\Models\CountryFlag;
use App\Models\Product;
use App\Models\ReplacementCycle;
use App\Models\Store;
use App\Models\StoreCity;
use App\Models\Style;
use App\Models\Type;
use Illuminate\Http\Request;

class AllProductsController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $search_products = Product::with('replacement_cycle')->where('name','like','%'.$search.'%')->get();
        $data =
        [
            'colors'                => Color::all(),
            'collections'           => Collection::all(),
            'actors'                => ActorProduct::all(),
            'types'                 => Type::all(),
            'styles'                => Style::all(),
            'wear_cycles'           => ReplacementCycle::all(),
            'stores'                => Store::orderBy('order', 'Asc')->get(),
            'cities'                => StoreCity::all(),
            'become_seller'         => BecomeSeller::first(),
            'search_products'       => $search_products ?? '',
            'products'              => Product::with('replacement_cycle')->get(),
            'country_flag'          => CountryFlag::first(),    
            // 'collection_products'   => $collection_products ? $collection_products->paginate(15) : '',
        ];
        return view('app.front-end.home-page.all-products', ['data' => $data]);
    }
}
