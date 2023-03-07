<?php

namespace App\Http\Controllers\Admin\Collection;

use App\DataTables\Collection\CollectionDataTable;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\CollectionInterface;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    protected $collection = null;
    public function __construct(CollectionInterface $collectionInterface)
    {
        $this->collection = $collectionInterface;
    }

    public function index(CollectionDataTable $collectionDataTable)
    {
        return $collectionDataTable->render('app.admin-panel.collections.index');
    }

    public function create()
    {
        return view('app.admin-panel.collections.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'  => 'required',
            'description'   => 'required',
            'banner'    => 'required',
            'image' => 'required',
            'slug'  => 'required'
        ]);
        return $this->collection->store($request->all());
    }

    public function getImage(Request $request)
    {
        return $this->collection->getImage($request->input('id'));
    }

    public function getBanner(Request $request)
    {
        return $this->collection->getBanner($request->input('id'));
    }

    public function edit($id)
    {
        return $this->collection->edit($id);   
    }

    public function update(Request $request,$id)
    {
        return $this->collection->update($request->all(),$id);
    }

    public function destroySelected(Request $request)
    {
        return $this->collection->destroy($request->chkData);   
    }
}
