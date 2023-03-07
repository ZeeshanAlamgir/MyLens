<?php

namespace App\Http\Controllers\Admin\StoreCity;

use App\DataTables\StoreCity\StoreCityDataTable;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\StoreCityInterface;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StoreCityController extends Controller
{
    protected $city = null;
    public function __construct(StoreCityInterface $cityInterface)
    {
        $this->city = $cityInterface;
    }

    public function index(StoreCityDataTable $storeCityDataTable)
    {
        return $storeCityDataTable->render('app.admin-panel.store-city.index');
    }

    public function create() :View
    {
        return view('app.admin-panel.store-city.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'  => 'required|regex:/^[a-zA-Z]+$/u|max:255'
        ]);
        return $this->city->store($request->all());
    }

    public function delete(Request $request)
    {
        return $this->city->delete($request->chkData);
    }

    public function edit($id)
    {
        return $this->city->edit($id);
    }

    public function update($id, Request $request)
    {
        return $this->city->update($id, $request->all());
    }
}
