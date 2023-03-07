<?php

namespace App\Repositories\Services;

use App\Models\Style;
use App\Repositories\Interfaces\StyleInterface;
use App\Traits\Image;
use Exception;
use Illuminate\Support\Facades\File;

class StyleService implements StyleInterface
{
    use Image;
    public $path = 'app-assets/images/style/';
    public function store($data)
    {
        try 
        {
            // if($data['label'] !=null && !empty($data['image']))
            if(isset($data))
            {
                $style = new Style();
                $style->label = $data['label'];
                $slug = checkSlug($style,$data['slug']);
                $style->slug = $slug;
                $style->image = $this->imageStoreUniqueName($this->path,$data['image'] ?? '');
                $style->save();
                return redirect()->route('style.index')->withSuccess('Style Added Successfully...');
                // return response()->json(['status'=>204]);
            }
            // else
                // return response()->json(['status'=>400]);
        } 
        catch (\Exception $ex)
        {
            return redirect()->back()->withDanger('Error'.$ex->getMessage());
            // return response()->json(['status'=>400]);
        }
    }

    public function edit($id)
    {
        $style = (new Style())->find(decryptParams($id));
        try 
        {
            if(isset($style) && !empty($style))
                return view('app.admin-panel.styles.edit',['style' => $style]);
            return redirect()->route('style.index')->withWarning('Data Not Found!');
        } 
        catch (\Exception $ex) 
        {
            return redirect()->route('style.index')->withDanger('Something went wrong!' . ' ' . $ex->getMessage());
        }
    }

    public function update($data, $id)
    {
        $style = (new Style())->find($id);
        $image_path = 'app-assets/images/style/';

        try
        {
            if($data['label'] !=null && $data['image']!=null)
            {
                try 
                {
                    if($data['image'] != null)
                    {
                        File::delete($image_path.$style->image);
                    }
                    else
                        $this->image = $style->image;
                } 
                catch (\Exception $ex) 
                {
                    $this->image = $style->image;
                }
                $style->label = $data['label'];
                $style->slug = $data['slug'];
                $style->image = $this->imageStoreUniqueName($image_path,$data['image'] ?? '');
                $style->save();
                return response()->json(['status'=>200]);
            }
            return response()->json(['status'=>400]);
        }
        catch(Exception $ex)
        {
            return response()->json(['status'=>400]);
        }
    }

    public function destroy($ids)
    {
        try 
        {
            if($ids)
            {
                $styles = (new Style())->whereIn('id',$ids)->get();
                if(isset($styles) && !empty($styles))
                {
                    foreach($styles as $style)
                    {
                        File::delete($this->path.$style->image);
                        $style->delete();
                    }
                    return redirect()->route('style.index')->withSuccess('Style Deleted!');
                }
            }
            else
                return redirect()->route('style.index')->withSuccess('Style Deleted!');
        } 
        catch (\Exception $ex) 
        {
            return redirect()->route('style.index')->withDanger('Something went wrong!' . ' ' . $ex->getMessage());
        }
    }

    public function getImage($id)
    {
        try 
        {
            $style = (new Style())->find($id);
            if(isset($style) && !empty($style))
            {
                return response()->json([
                    'status'    => true,
                    'data'      => $style->image

                ]);
            }
            else
            {
                return response()->json([
                    'status' => false
                ]);
            }
        } 
        catch (\Throwable $th)
        {
            return response()->json([
                'status' => false
            ]);
        }
    }
}
