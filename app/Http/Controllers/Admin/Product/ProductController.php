<?php

namespace App\Http\Controllers\Admin\Product;

use App\DataTables\Product\ProductDataTable;
use App\Http\Controllers\Controller;
use App\Models\Collection;
use App\Models\Color;
use App\Models\Product;
use App\Models\ReplacementCycle;
use App\Models\StoreCity;
use App\Models\Style;
use App\Models\Tone;
use App\Models\Type;
use App\Repositories\Interfaces\ProductInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public $product = null;
    public function __construct(ProductInterface $productInterface)
    {
        $this->product = $productInterface;
    }

    public function index(ProductDataTable $productDataTable)
    {
        return $productDataTable->render('app.admin-panel.product.index');
    }

    public function create()
    {
        $data = [
            'colors'        => Color::all(),
            'collections'   => Collection::all(),
            'tones'         => Tone::all(),
            'styles'        => Style::all(),
            'replacement_cycle'    => ReplacementCycle::all(),
            'types'         => Type::all(),
        ];
        return view('app.admin-panel.product.create',compact('data'));
    }

    
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'  => 'required',
            'description'  => 'required',
            'color_id.*'  => 'required',
            'type_id.*'  => 'required',
            'tone_id'  => 'required',
            'style_id'  => 'required',
            'replacement_cycle_id'  => 'required',
            'collection_id'  => 'required',
            'base_curve'  => 'required',
            'diameter'  => 'required',
            'oxygen_permeability'  => 'required',
            'center_thickness'  => 'required',
            'power'  => 'required',
            'before_after_description'  => 'required',
            'before_image'  => 'required',
            'after_image'  => 'required',
            'image'  => 'required',
            'galleries'  => 'required',
            'buy_product_online_link' => 'required'
        ]);
        return $this->product->store($request->all());
    }

    public function getImage(Request $request)
    {
        return $this->product->getImage($request->input('id'));
    }

    public function productDetails(Request $request)
    {
        return $this->product->productDetails($request->input('id'));
    }

    public function edit($id)
    {
        return $this->product->edit($id);
    }

    public function update(Request $request, $id)
    {
        return $this->product->update($request->all(), $id);
    }

    public function destroy(Request $request)
    {
        return $this->product->destroy($request->chkData);
    }

    public function beforeImage(Request $request)
    {
        return $this->product->beforeImage($request->input('id'));
    }

    public function afterImage(Request $request)
    {
        return $this->product->afterImage($request->input('id'));
    }

}
