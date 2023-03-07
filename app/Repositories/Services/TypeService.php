<?php

namespace App\Repositories\Services;

use App\Models\Type;
use App\Repositories\Interfaces\TypeInterface;
use App\Traits\Image;
use Illuminate\Support\Facades\File;

class TypeService implements TypeInterface
{
    use Image;
    public $path = 'app-assets/images/type/';
    public function store($data)
    {
        try 
        {
            // if($data['label'] !=null && !empty($data['image']))
            if(isset($data))
            {
                $type = (new Type());
                $type->label = $data['label'];
                $slug = checkSlug($type,$data['slug']);
                $type->slug = $slug;
                $type->image = $this->imageStoreUniqueName($this->path,$data['image'] ?? '');
                $type->save();
                // return response()->json(['status'=>204]);
                return redirect()->route('type.index')->withSuccess('Type Added Successfully...');
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
        $type = (new Type())->find(decryptParams($id));
        try 
        {
            if(isset($type) && !empty($type))
                return view('app.admin-panel.types.edit',['type' => $type]);
            return redirect()->route('type.index')->withWarning('Data Not Found!');
        } 
        catch (\Exception $ex) 
        {
            return redirect()->route('type.index')->withDanger('Something went wrong!' . ' ' . $ex->getMessage());
        }
    }

    public function update($data, $id)
    {
        $image_path = 'app-assets/images/type/';
        $type = (new Type())->find($id);
        try 
        {
            if($data['label'] !=null && $data['image']!=null)
            {
                try 
                {
                    if($data['image'] != null)
                    {
                        File::delete($image_path.$type->image);
                    }
                    else
                        $this->image = $type->image;
                } 
                catch (\Exception $ex) 
                {
                    $this->image = $type->image;
                }
                $type->label = $data['label'];
                $type->slug = $data['slug'];
                $type->image = $this->imageStoreUniqueName($image_path,$data['image'] ?? '');
                $type->save();
                return response()->json(['status'=>200]);
            }
            return response()->json(['status'=>400]);
        } 
        catch (\Exception $ex) 
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
                $types = (new Type())->whereIn('id',$ids)->get();
                if(isset($types) && !empty($types))
                {
                    foreach($types as $type)
                    {
                        File::delete($this->path.$type->image);
                        $type->delete();
                    }
                    return redirect()->route('type.index')->withSuccess('Type Deleted!');
                }
            }
            else
                return redirect()->route('type.index')->withSuccess('Type Deleted!');
        } 
        catch (\Exception $ex) 
        {
            return redirect()->route('type.index')->withDanger('Something went wrong!' . ' ' . $ex->getMessage());
        }
    }

    public function getImage($id)
    {
        try 
        {
            $type = (new Type())->find($id);
            if(isset($type) && !empty($type))
            {
                return response()->json([
                    'status'    => true,
                    'data'      => $type->image

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
