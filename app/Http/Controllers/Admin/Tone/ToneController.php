<?php

namespace App\Http\Controllers\Admin\Tone;

use App\DataTables\Tone\ToneDataTable;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\ToneInterface;
use Illuminate\Http\Request;

class ToneController extends Controller
{
    protected $tone = null;
    public function __construct(ToneInterface $toneInterface)
    {
        $this->tone = $toneInterface;
    }

    public function index(ToneDataTable $toneDataTable)
    {
        return $toneDataTable->render('app.admin-panel.tone.index');
    }

    public function create()
    {
        return view('app.admin-panel.tone.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'label' => 'required',
            'slug'  => 'required'
        ]);
        return $this->tone->store($request->all());
    }

    public function edit($id)
    {
        return $this->tone->edit($id);
    }

    public function update(Request $request, $id)
    {
        return $this->tone->update($request->all(), $id);
    }

    public function destroy(Request $request)
    {
        return $this->tone->destroy($request->chkData);
    }
}
