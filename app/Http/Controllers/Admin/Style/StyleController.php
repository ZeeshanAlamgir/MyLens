<?php

namespace App\Http\Controllers\Admin\Style;

use App\DataTables\Style\StyleDataTable;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\StyleInterface;
use Illuminate\Http\Request;

class StyleController extends Controller
{
    protected $style = null;
    public function __construct(StyleInterface $styleInterface)
    {
        $this->style = $styleInterface;
    }

    public function index(StyleDataTable $styleDataTable)
    {
        return $styleDataTable->render('app.admin-panel.styles.index');
    }

    public function create()
    {
        return view('app.admin-panel.styles.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'label' => 'required',
            'slug'  => 'required',
            'image' => 'required'
        ]);
        return $this->style->store($request->all());
    }

    public function edit($id)
    {
        return $this->style->edit($id);
    }

    public function update(Request $request, $id)
    {
        return $this->style->update($request->all(), $id);
    }

    public function destroy(Request $request)
    {
        return $this->style->destroy($request->chkData);
    }

    public function getImage(Request $request)
    {
        return $this->style->getImage($request->input('id'));
    }
}
