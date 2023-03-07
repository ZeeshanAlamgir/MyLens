<?php

namespace App\Repositories\Services;

use App\Models\Color;
use App\Repositories\Interfaces\ColorInterface;
use App\Traits\Image;
use Exception;
use Illuminate\Support\Facades\File;

class ColorService implements ColorInterface
{
    use Image;
    protected $banner_path = 'app-assets/images/colors/banner/';
    protected $image_path = 'app-assets/images/colors/images/';
    public function store(array $data)
    {
        try
        {
            $color = (new Color());
            $slug = checkSlug($color, $data['slug']);
            $color->name = $data['name'];
            $color->slug = $slug;
            $color->banner = $this->imageStoreUniqueName($this->banner_path,$data['banner'] ?? '');
            $color->image = $this->imageStoreUniqueName($this->image_path,$data['image'] ?? '');
            $color->save();
            // return response()->json(['status'=>204]);
            return redirect()->route('color.index')->withSuccess('Color Added Successfully ...');
        }
        catch (Exception $ex)
        {
            return redirect()->back()->withDanger('Error'.$ex->getMessage());
            // return response()->json(['status'=>400,'message'=>$ex->getMessage()]);
        }
    }

    public function getImage($id)
    {
        try
        {
            $color = (new Color())->find($id);
            if ($color)
            {
                return response()->json([
                    'status' => true,
                    'data' => $color->image
                ]);
            }
            else
            {
                return response()->json([
                    'status' => false
                ]);
            }
        }
        catch (Exception $e)
        {
            return response()->json([
                'status' => false
            ]);
        }
    }

    public function getBanner($id)
    {
        try
        {
            $color = (new Color())->find($id);
            if ($color)
            {
                return response()->json([
                    'status' => true,
                    'data' => $color->banner
                ]);
            }
            else
            {
                return response()->json([
                    'status' => false
                ]);
            }
        }
        catch (Exception $e)
        {
            return response()->json([
                'status' => false
            ]);
        }
    }

    public function edit($id)
    {
        try
        {
            $color = (new Color())->find(decryptParams($id));
            if ($color && !empty($color))
                return view('app.admin-panel.colors.edit', ['color' => $color]);
            return redirect()->route('color.index')->withWarning('Data Not Found!');
        }
        catch (Exception $ex)
        {
            return redirect()->route('color.index')->withDanger('Something went wrong!' . ' ' . $ex->getMessage());
        }
    }

    public function update(array $data,$id)
    {
        $image_path = 'app-assets/images/colors/images/';
        $banner_path = 'app-assets/images/colors/banner/';
        $image = null;
        $banner= null;
        $color = (new Color())->find($id);
        //Image
        try
        {
            if($data['image'] != null)
            {
                File::delete($image_path.$color->image);
                $this->image = $this->imageStoreUniqueName($this->image_path,$data['image'] ?? '');
            }
            else
                $this->image = $color->image;
        }
        catch (\Exception $ex)
        {
            $this->image = $color->image;
        }
        //Banner
        try {
            if($data['banner'] != null)
            {
                File::delete($banner_path.$color->banner);
                $this->banner = $this->imageStoreUniqueName($this->banner_path,$data['banner'] ?? '');
            }
            else
                $this->banner = $color->banner;
        }
        catch (\Exception $ex)
        {
            $this->banner = $color->banner;
        }
        try
        {
            $color->name = $data['name'];
            $color->slug = $data['slug'];
            $color->banner = $this->banner;
            $color->image = $this->image;
            $color->save();
            return response()->json(['status'=>200]);
        }
        catch (\Exception $ex)
        {
            return response()->json(['status'=>400]);
        }
    }

    public function destroy($request)
    {
        try
        {
            if ($request)
            {
                $colors = (new Color())->whereIn('id', $request)->get();
                if(isset($colors) && !empty($colors))
                {
                    foreach($colors as $color)
                    {
                        File::delete($this->banner_path.$color->banner);
                        File::delete($this->image_path.$color->image);
                        $color->delete();
                    }
                    return redirect()->route('color.index')->withSuccess('Color Deleted!');
                }
            }
            else
                return redirect()->route('color.index')->withWarning('Please select at least one item!');
        }
        catch (Exception $ex)
        {
            return redirect()->route('color.index')->withDanger('Something went wrong!' . ' ' . $ex->getMessage());
        }
    }
}
