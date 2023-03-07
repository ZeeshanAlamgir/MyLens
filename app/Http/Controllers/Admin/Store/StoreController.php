<?php

namespace App\Http\Controllers\Admin\Store;

use App\DataTables\Store\StoreDataTable;
use App\Http\Controllers\Controller;
use App\Models\Store;
use App\Models\StoreCity;
use App\Repositories\Interfaces\StoreInterface;
use Illuminate\Http\Request;

class StoreController extends Controller
{

    protected $store = null;
    public function __construct(StoreInterface $storeInterface)
    {
        $this->store = $storeInterface;
    }

    public function index(StoreDataTable $storeCycleDataTable)
    {
        return $storeCycleDataTable->render('app.admin-panel.stores.index');
    }

    public function create()
    {
        $cities = StoreCity::all();
        return view('app.admin-panel.stores.create',compact('cities'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'  => 'required',
            'address'  => 'required',
            'latitude'  => 'required|regex:/^\d+(\.\d{1,8})?$/',
            'longitude'  => 'required|regex:/^\d+(\.\d{1,8})?$/',
            'city_id'  => 'required',
            'order'  => 'required',
        ]);
        return $this->store->store($request->all());
    }   

    public function edit($id)
    {
        return $this->store->edit($id);
    }

    public function update(Request $request, $id)
    {
        return $this->store->update($request->all(),$id);
    }

    public function destroy(Request $request)
    {
        return $this->store->destroy($request->chkData);
    }

    public function cityStores(Request $request)
    {
        $city_id = (int)$request->id;
        $stores = (new Store())->where('city_id',$city_id)->get();
        return response()->json(['status'=>true,'stores'=>$stores]);
    }
}
