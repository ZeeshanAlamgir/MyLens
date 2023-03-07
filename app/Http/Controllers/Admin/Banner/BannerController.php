<?php

namespace App\Http\Controllers\Admin\Banner;

use App\DataTables\Banner\BannerDataTable;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\BannerInterface;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public $banner = null;
    public function __construct(BannerInterface $bannerInterface)
    {
        $this->banner = $bannerInterface;
    }
    
    public function index(BannerDataTable $bannerDataTable)
    {
        return $bannerDataTable->render('app.admin-panel.banner.index');
    }

    public function create()
    {
        return view('app.admin-panel.banner.create');
    }

    public function store(Request $request)
    {
        return $this->banner->store($request->all());
    }

    public function getImages(Request $request)
    {
        return $this->banner->getImages($request->input('id'));
    }

    public function edit($id)
    {
        return $this->banner->edit($id);
    }

    public function update(Request $request ,$id)
    {
        return $this->banner->update($request->all(),$id);
    }

    public function delete(Request $request)
    {
        return $this->banner->delete($request->input('chkData'));
    }
}
