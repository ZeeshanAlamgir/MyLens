<?php

namespace App\Http\Controllers\Admin\ReplacementCycle;

use App\DataTables\ReplacementCycle\ReplacementCycleDataTable;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\ReplacementCycleInterface;
use Illuminate\Http\Request;

class ReplacementCycleController extends Controller
{

    protected $replacementCycle = null;
    public function __construct(ReplacementCycleInterface $replacementCycleInterface)
    {
        $this->replacementCycle = $replacementCycleInterface;
    }

    public function index(ReplacementCycleDataTable $replacementCycleDataTable)
    {
        return $replacementCycleDataTable->render('app.admin-panel.replacement-cycle.index');
    }

    public function create()
    {
        return view('app.admin-panel.replacement-cycle.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'  => 'required',
            'image' => 'required',
            'slug' => 'required'
        ]);
        return $this->replacementCycle->store($request->all());
    }   

    public function getImage(Request $request)
    {
        return $this->replacementCycle->getImage($request->input('id'));
    }

    public function edit($id)
    {
        return $this->replacementCycle->edit($id);
    }

    public function update(Request $request, $id)
    {
        return $this->replacementCycle->update($request->all(),$id);
    }

    public function destroy(Request $request)
    {
        return $this->replacementCycle->destroy($request->chkData);
    }
}
