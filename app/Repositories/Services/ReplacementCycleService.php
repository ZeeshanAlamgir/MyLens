<?php

namespace App\Repositories\Services;

use App\Models\ReplacementCycle;
use App\Repositories\Interfaces\ReplacementCycleInterface;
use App\Traits\Image;
use Exception;
use Illuminate\Support\Facades\File;

class ReplacementCycleService implements ReplacementCycleInterface
{
    use Image;
    public $path = 'app-assets/images/replacement-cycle/images/';
    public function store($data)
    {
        try 
        {
            // if($data['name'] !=null && !empty($data['name']))
            if(isset($data))
            {
                $replacement_cycle = (new ReplacementCycle());
                $slug = checkSlug($replacement_cycle,$data['slug']);
                $replacement_cycle->name = $data['name'];
                $replacement_cycle->slug = $slug;
                $replacement_cycle->image = $this->imageStoreUniqueName($this->path,$data['image'] ?? '');
                $replacement_cycle->save();
                // return response()->json(['status'=>204]);
                return redirect()->route('replacement-cylce.index')->withSuccess('Replacement Cycle Added Successfully...');
            }
            // else
                // return response()->json(['status'=>400]);
        } 
        catch (Exception $ex) 
        {
            return redirect()->back()->withDanger('Error'.$ex->getMessage());
            // return response()->json(['status'=>400]);
        }
    }

    public function getImage($id)
    {
        try 
        {
            $replacement_cycle = (new ReplacementCycle())->find($id);
            if(isset($replacement_cycle) && !empty($replacement_cycle))
            {
                return response()->json([
                    'status'    => true,
                    'data'      => $replacement_cycle->image

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

    public function edit($id)
    {
        $replacement_cycle = (new ReplacementCycle())->find(decryptParams($id));
        try 
        {
            if(isset($replacement_cycle) && !empty($replacement_cycle)) 
                return view('app.admin-panel.replacement-cycle.edit',['replacement_cycle' => $replacement_cycle]);
            return redirect()->route('color.index')->withWarning('Data Not Found!');
        } 
        catch (\Throwable $ex)
        {
            return redirect()->route('color.index')->withDanger('Something went wrong!' . ' ' . $ex->getMessage());
        }
    }

    public function update(array $data, $id)
    {
        $image_path = 'app-assets/images/replacement-cycle/images/';
        $image = null;
        $replacement_cycle = (new ReplacementCycle())->find($id);
        
        try
        {
            if($data['name'] !=null && $data['image']!=null)
            {
                try 
                {
                    if($data['image'] != null)
                    {
                        File::delete($image_path.$replacement_cycle->image);
                    }
                    else
                        $this->image = $replacement_cycle->image;
                } 
                catch (\Exception $ex) 
                {
                    $this->image = $replacement_cycle->image;
                }
                $replacement_cycle->name = $data['name'];
                $replacement_cycle->slug = $data['slug'];
                $replacement_cycle->image = $this->imageStoreUniqueName($image_path,$data['image'] ?? '');
                $replacement_cycle->save();
                return response()->json(['status'=>200]);
            }
            return response()->json(['status'=>400]);
        }
        catch(Exception $ex)
        {
            return response()->json(['status'=>400]);
        }
    }

    public function destroy($request)
    {
        try 
        {
            if($request)
            {
                $replacement_cycles = (new ReplacementCycle())->whereIn('id',$request)->get();
                if(isset($replacement_cycles) && !empty($replacement_cycles))
                {
                    foreach($replacement_cycles as $replacement_cycle)
                    {
                        File::delete($this->path.$replacement_cycle->image);
                        $replacement_cycle->delete();
                    }
                    return redirect()->route('replacement-cylce.index')->withSuccess('Collection Deleted!');
                }
                else
                    return redirect()->route('replacement-cylce.index')->withWarning('Please select at least one item!');
            }
        } 
        catch (\Throwable $ex) 
        {
            return redirect()->route('replacement-cylce.index')->withDanger('Something went wrong!' . ' ' . $ex->getMessage());
        }
    }

}
