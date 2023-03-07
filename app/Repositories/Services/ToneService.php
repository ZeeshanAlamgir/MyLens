<?php

namespace App\Repositories\Services;

use App\Models\Tone;
use App\Repositories\Interfaces\ToneInterface;

class ToneService implements ToneInterface
{
    public function store($data)
    {
        try 
        {
            // (new Tone())->create([
            //     'label'  => $data['label']
            // ]);
            // return response()->json(['status'=>204]);
            if(isset($data))
            {
                $tone = new Tone();
                $slug = checkSlug($tone,$data['slug']);
                $tone->label = $data['label'];
                $tone->slug = $slug;
                $tone->save();
                return redirect()->route('tone.index')->withSuccess('Tone Added Successfully...');
            }
            
        } 
        catch (\Exception $ex)
        {
            return redirect()->back()->withDanger('Error'.$ex->getMessage());
            // return response()->json(['status'=>400]);
        }
    }

    public function edit($id)
    {
        $tone = (new Tone())->find(decryptParams($id));
        try 
        {
            if(isset($tone) && !empty($tone))
                return view('app.admin-panel.tone.edit',['tone' => $tone]);
            return redirect()->route('tone.index')->withWarning('Data Not Found!');
        } 
        catch (\Exception $ex) 
        {
            return redirect()->route('tone.index')->withDanger('Something went wrong!' . ' ' . $ex->getMessage());
        }
    }

    public function update($data, $id)
    {
        $tone = (new Tone())->find($id);
        try 
        {
            if(isset($tone) && !empty($tone))
            {
                $tone->label = $data['label'];
                $tone->save();
                return response()->json(['status'=>200]);
            }
            else
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
                $tones = (new Tone())->whereIn('id',$ids)->get();
                foreach($tones as $tone)
                {
                    $tone->delete();
                }
                return redirect()->route('tone.index')->withSuccess('Tone Deleted!');
            }
            else
                return redirect()->route('tone.index')->withSuccess('Tone Deleted!');
        } 
        catch (\Exception $ex) 
        {
            return redirect()->route('tone.index')->withDanger('Something went wrong!' . ' ' . $ex->getMessage());
        }
    }
}
