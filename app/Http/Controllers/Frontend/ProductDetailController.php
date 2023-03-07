<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ActorProduct;
use App\Models\Banner;
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
use Illuminate\View\View;

class ProductDetailController extends Controller
{
    public function create($slug) :View
    {
        $product = (new Product())->with('colors:id,name','types:id,label','collection:id,name','replacement_cycle:id,name','collection:id,name','style:id,label','tone:id,label','gallery:product_id,image')->where('slug',$slug)->first();
        $lens_materials = $product['lens_material'] ? json_decode($product['lens_material']) : '';
        $data =
            [   
                'product'       => $product,
                'colors'        => Color::all(),
                'collections'   => Collection::all(),
                'actors'        => ActorProduct::all(),
                'types'         => Type::all(),
                'styles'        => Style::all(),
                'wear_cycles'   => ReplacementCycle::all(),
                'banner'        => Banner::all(),
                'stores'        => Store::orderBy('order', 'Asc')->get(),
                'lens_materials'=> $lens_materials,
                'become_seller' => BecomeSeller::first(),
                'cities'        => StoreCity::all(),
                'country_flag'  => CountryFlag::first()    
                
            ];
        return view('app.front-end.product.product-detail',compact('data'));
    }
}
