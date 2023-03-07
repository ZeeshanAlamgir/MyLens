<?php

namespace App\Http\Controllers\Admin\Type;

use App\DataTables\Types\TypeDataTable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\TypeInterface;

class TypeController extends Controller
{
    protected $type = null;
    public function __construct(TypeInterface $typeInterface)
    {
        $this->type = $typeInterface;
    }

    public function index(TypeDataTable $typeDataTable)
    {
        return $typeDataTable->render('app.admin-panel.types.index');
    }

    public function create()
    {
        return view('app.admin-panel.types.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'label' => 'required',
            'slug'  => 'required',
            'image' => 'required'
        ]);
        return $this->type->store($request->all());
    }

    public function edit($id)
    {
        return $this->type->edit($id);
    }

    public function update(Request $request, $id)
    {
        return $this->type->update($request->all(), $id);
    }

    public function destroy(Request $request)
    {
        return $this->type->destroy($request->chkData);
    }

    public function getImage(Request $request)
    {
        return $this->type->getImage($request->input('id'));
    }
}