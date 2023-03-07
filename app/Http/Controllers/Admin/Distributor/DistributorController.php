<?php

namespace App\Http\Controllers\Admin\Distributor;

use App\DataTables\Distributor\DistributorDataTable;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\DistributorInterface;
use Illuminate\Http\Request;

class DistributorController extends Controller
{

    protected $distributor = null;
    public function __construct(DistributorInterface $distributorInterface)
    {
        $this->distributor = $distributorInterface;
    }

    public function index(DistributorDataTable $distributorDataTable)
    {
        return $distributorDataTable->render('app.admin-panel.distributors.index');
    }

    public function create()
    {
        return view('app.admin-panel.distributors.create');
    }

    public function store(Request $request)
    {
        return $this->distributor->store($request->all());
    }   

    public function getImage(Request $request)
    {
        return $this->distributor->getImage($request->input('id'));
    }

    public function edit($id)
    {
        return $this->distributor->edit($id);
    }

    public function update(Request $request, $id)
    {
        return $this->distributor->update($request->all(),$id);
    }

    public function destroy(Request $request)
    {
        return $this->distributor->destroy($request->chkData);
    }
}
