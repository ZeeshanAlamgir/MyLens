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
use App\Models\ProductColor;
use App\Models\ProductType;
use App\Models\ReplacementCycle;
use App\Models\Store;
use App\Models\StoreCity;
use App\Models\Style;
use App\Models\Type;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
class HomeController extends Controller
{
    public function home()
    {
        $data =
            [
                'colors'        => Color::all(),
                'collections'   => Collection::all(),
                'actors'        => ActorProduct::with('product:id,slug')->get(),
                'types'         => Type::all(),
                'styles'        => Style::all(),
                'wear_cycles'   => ReplacementCycle::all(),
                'banner'        => Banner::all(),
                'stores'        => Store::orderBy('order', 'Asc')->get(),
                'cities'        => StoreCity::all(),
                'become_seller' => BecomeSeller::first(),
                'country_flag'  => CountryFlag::first()    
            ];
        return view('app.front-end.home-page.home', ['data'  => $data]);
    }

    public function collections(Request $request, $by = '', $slug = '')
    {
        $collection_products = null;
        $search_products = null;
        if($by=='collections')
        {
            $collection_products = Product::whereHas('collection', function ($q) use ($slug) {
                $q->where('slug', $slug);
            });
            // ->get();
        }
        else if($by=='colors')
        {
            // $color_slug = explode('/',URL::current());
            // $color_id = Color::where('slug',$color_slug[5])->pluck('id')->first();
            // $colors = Color::with('products')->where('id',$color_id)->get();
            // foreach($colors as $color)
            //     $collection_products = $color['products'];
            // dd($colors);

            $clr_ids_array = [];
            $color_slug = explode('/',URL::current());
            $color_id = Color::where('slug',$color_slug[5])->pluck('id')->first();
            $colors = ProductColor::where('color_id',$color_id)->get();//overall colors search
            foreach($colors as $color)
                array_push($clr_ids_array,$color->product_id);
            $collection_products = Product::whereIn('id',$clr_ids_array);
        }
        else if($by=='types')
        {
            $prod_ids_array = [];
            $type_slug = explode('/',URL::current());
            $type_id = Type::where('slug',$type_slug[5])->pluck('id')->first();
            $product_ids = ProductType::where('type_id',$type_id)->get();
            foreach($product_ids as $product_id)
                array_push($prod_ids_array,$product_id->product_id);
            $collection_products = Product::whereIn('id',$prod_ids_array);
        }
        else if($by=='wear_cycle')
        {
            $wear_slug = explode('/',URL::current());
            $replacement_cycle_id = ReplacementCycle::where('slug',$wear_slug[5])->pluck('id')->first();
            $collection_products = Product::where('replacement_cycle_id',$replacement_cycle_id);
        }
        else if($by=='style')
        {
            $style_slug = explode('/',URL::current());
            $style_id = Style::where('slug',$style_slug[5])->pluck('id')->first();
            $collection_products = Product::where('style_id',$style_id);
        }
        else if($request->search)
        {
            $search = $request->search;
            $search_products = Product::with('replacement_cycle')->where('name','like','%'.$search.'%')->get();
        }
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
            'country_flag'          => CountryFlag::first(),    
            'collection_products'   => $collection_products ? $collection_products->paginate(15) : '',
        ];
        return view('app.front-end.home-page.specific-collection', ['data' => $data]);
    }

    public function filters(Request $request, $id)
    {
        try
        {
            if(!is_null($request->collection_push__array))
            {
                $id = $request->collection_push__array[0];
            }
            $product_ids = [];
            $wear_product_ids = [];
            $clr_prods_ids = [];
            $product_type_ids = [];
            $collection_products = [];
            if ($request->ajax()) {
                // $collection_products = Product::whereHas('collection', function ($q) use ($id) {
                //     $q->where('id', $id);
                // })
                //     ->where('collection_id', $id)
                //     ->get();
                    $collection_products = Product::whereHas('collection', function ($q) use ($id) {
                        $q->where('id', $id);
                    })
                    ->with('replacement_cycle')
                    ->where('collection_id', $id)
                    ->get();
                    // dd($collection_products);
                foreach ($collection_products as $collection_product)
                    array_push($product_ids, $collection_product->id);

                if ($request->collection_push__array==null || empty($request->collection_push__array)) {
                    $collection_products = Product::with('replacement_cycle')->get();
                    foreach ($collection_products as $collection_product)
                        array_push($product_ids, $collection_product->id);
                }

                if (isset($request->collection_push__array)) {
                    $collection_products = Product::with('replacement_cycle')->whereIn('collection_id', $request->collection_push__array)->get();
                    foreach ($collection_products as $collection_product)
                        array_push($product_ids, $collection_product->id);
                }
                
                if (isset($request->colors)) {
                    $products_colors = ProductColor::whereIn('color_id', $request->colors)
                        ->whereIn('product_id', $product_ids)
                        ->get();
                    foreach ($products_colors as $clr_prd)
                        array_push($clr_prods_ids, $clr_prd->product_id);
                    $collection_products = Product::with('replacement_cycle')->whereIn('id', $clr_prods_ids)->get();
                }

                if (isset($request->wear_push__array)) 
                {
                    // $products_by_wear = $collection_products->whereIn('replacement_cycle_id', $request->wear_push__array);
                    // $collection_products = [];
                    // foreach ($products_by_wear as $key => $value)
                    //     array_push($collection_products, $value);

                    $filtered_collection = $collection_products;
                    $collection_products = [];

                    $wear_id = $request->wear_push__array[0];

                    foreach($filtered_collection as $collection_product)
                    {
                        if($collection_product->replacement_cycle_id == $wear_id){
                            array_push($collection_products, $collection_product);
                        }   
                    }
                }

                if (isset($request->type_push__array)) 
                {
                    foreach ($collection_products as $collection_product)
                        array_push($wear_product_ids, $collection_product->id);
                    $product_types = ProductType::whereIn('type_id', $request->type_push__array)
                        ->whereIn('product_id', $wear_product_ids)
                        ->get();
                    if (isset($product_types)) {
                        foreach ($product_types as $product_type)
                            array_push($product_type_ids, $product_type->product_id);
                        $collection_products = Product::with('replacement_cycle')->whereIn('id', $product_type_ids)->get();
                    }
                }

                if (isset($request->style_push__array)) 
                {
                    $filtered_collection = $collection_products;
                    $collection_products = [];

                    $style_id = $request->style_push__array[0];

                    foreach($filtered_collection as $collection_product)
                    {
                        if($collection_product->style_id == $style_id){
                            array_push($collection_products, $collection_product);
                        }   
                    }

                }
                else if(count($request->all())==0 || $request->all()==[] || $request->all()===[])
                {
                    $collection_products = Product::with('replacement_cycle')->get();
                    foreach ($collection_products as $collection_product)
                        array_push($product_ids, $collection_product->id);
                }

                //     $products_by_style = $collection_products->whereIn('style_id', $request->style_push__array);
                //     dd($products_by_style);
                //     $collection_products = [];
                //     foreach ($products_by_style as $key => $value)
                //         array_push($collection_products, $value);
                // }
                // dd($collection_products);
                return response()->json(['collection_products' => $collection_products, 'status' => true]);
            }
        }
        catch(Exception $ex)
        {
            return redirect()->back()->withDanger($ex->getMessage());
        }
    }

    public function clearFilters(Request $request)
    {
        if($request->ajax())
        {
            return response()->json([
                'status'    => true,
                'products'  => Product::with('replacement_cycle')->get()
            ]);
        }
    }
}
