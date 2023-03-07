<?php

namespace App\Http\Controllers\Admin\ActorProduct;

use App\DataTables\ActorProduct\ActorProductDataTable;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repositories\Interfaces\ActorProductInterface;
use Illuminate\Http\Request;

class ActorProductController extends Controller
{
    protected $actor = null;
    public function __construct(ActorProductInterface $actorProductInterface)
    {
        $this->actor = $actorProductInterface;
    }

    public function index(ActorProductDataTable $actorProductDataTable)
    {
        return $actorProductDataTable->render('app.admin-panel.actor-product.index');
    }

    public function create()
    {
        $products = Product::all();
        return view('app.admin-panel.actor-product.create',compact('products'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'  => 'required',
            'product_id'  => 'required|exists:products,id',
            'image'  => 'required',
        ]);
        return $this->actor->store($request->all());
    }   

    public function getImage(Request $request)
    {
        return $this->actor->getImage($request->input('id'));
    }

    public function edit($id)
    {
        return $this->actor->edit($id);
    }

    public function update(Request $request, $id)
    {
        return $this->actor->update($request->all(),$id);
    }

    public function destroy(Request $request)
    {
        return $this->actor->destroy($request->input('chkData'));
    }
}
