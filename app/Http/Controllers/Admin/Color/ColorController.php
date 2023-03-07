<?php

namespace App\Http\Controllers\Admin\Color;

use App\DataTables\Color\ColorDataTable;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\ColorInterface;
use Illuminate\Http\Request;

class ColorController extends Controller
{

    private $color = null;
    public function __construct(ColorInterface $colorInterface)
    {
        $this->color = $colorInterface;
    }

    public function index(ColorDataTable $colorDataTable)
    {
        return $colorDataTable->render('app.admin-panel.colors.index');
    }

    public function create()
    {
        return view('app.admin-panel.colors.create');
    }

    public function store(Request $request)
    {
        // $file = $request->file('image');
        // $name = $file->getClientOriginalName();
        // $new_name = time() . '.' . $name;
        // $destinationPath = public_path('app-assets/images');
        // $file->move($destinationPath, $new_name);

        // dd($request);
        $this->validate($request,[
            'name'  => 'required',
            'banner'    => 'required',
            'image' => 'required',
            'slug'  => 'required'
        ]);
        return $this->color->store($request->all());
    }

    public function getImage(Request $request)
    {
        return $this->color->getImage($request->input('id'));
    }

    public function getBanner(Request $request)
    {
        return $this->color->getBanner($request->input('id'));
    }

    public function edit($id)
    {
        return $this->color->edit($id);
    }

    public function update(Request $request,$id)
    {
        return $this->color->update($request->all(),$id);
    }

    public function destroySelected(Request $request)
    {
        return $this->color->destroy($request->chkData);
    }

}
