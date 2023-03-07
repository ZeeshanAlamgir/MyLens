<?php

namespace App\Repositories\Services;

use App\Models\Banner;
use App\Repositories\Interfaces\BannerInterface;
use App\Traits\Image;
use Illuminate\Support\Facades\File;

class BannerService implements BannerInterface
{
    use Image;
    protected $image_path = 'app-assets/images/banner/';
    public function store($data)
    {
        try 
        {
            if(isset($data) && !empty($data))
            {
                foreach ($data['images'] as $key => $image) {
                    $banner = (new Banner());
                    $banner->image = $this->imageStoreUniqueName($this->image_path,$image) ?? '';
                    $banner->save();
                }
                return response()->json(['status'=>204]);
            }
        } 
        catch (\Throwable $th) 
        {
            return response()->json(['status'=>400]);
        }
    }

    public function getImages($id)
    {
        try
        {
            if(isset($id) && !empty($id))
            {
                $banner = (new Banner())->find($id);
                if(isset($banner))
                {
                    return response()->json([
                        'status'=>false,
                        'data' =>$banner->image
                    ]);
                }
            }
        } 
        catch (\Throwable $th) 
        {
            //throw $th;
        }
    }

    public function edit($id)
    {
        if(isset($id))
        {
            $banner = (new Banner())->find(decryptParams($id));
            if(isset($banner))
                return view('app.admin-panel.banner.edit',compact('banner'));
            else
                return redirect()->route('banner.index')->withWarning('Data Not Found!');
        }
        else
            return redirect()->route('banner.index')->withWarning('Data Not Found!');
    }

    public function update(array $data,$id)
    {
        $path = null;
        if(isset($id))
        {
            $banner = (new Banner())->find($id);
            $path = 'app-assets/images/banner/'.$banner->image;
            if(isset($data) && !empty($data))
            {
                if(File::exists($path))
                    File::delete($path);
                $banner->image = $this->imageStoreUniqueName($this->image_path,$data['image']) ?? '';
                $banner->save();
                return response()->json(['status'=>201]);
            }
        }
        else
            return response()->json(['status'=>400]);
    }

    public function delete($ids)
    {
        if(isset($ids))
        {
            $banner_ids = (new Banner())->whereIn('id',$ids)->get();
            foreach($banner_ids as $banner_id)
            {
                $path = 'app-assets/images/banner/'.$banner_id->image;
                if(File::exists($path))
                    File::delete($path);
                $banner_id->delete();
                
            }
            return redirect()->route('banner.index')->withSuccess('Banner Image Deleted!');
        }
    }
}
