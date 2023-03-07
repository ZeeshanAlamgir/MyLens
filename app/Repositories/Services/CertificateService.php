<?php

namespace App\Repositories\Services;

use App\Models\Certification;
use App\Repositories\Interfaces\CertificateInterface;
use App\Traits\Image;
use Exception;
use File;

class CertificateService implements CertificateInterface
{
    use Image;
    protected $certificate_image_path = 'app-assets/images/certification/';
    public function store(array $data)
    {
        try 
        {
            if(isset($data))
            {
                $certificate = (new Certification());
                $certificate->description = $data['description'];
                $certificate->image = $this->imageStoreUniqueName($this->certificate_image_path,$data['image']) ?? '';
                $certificate->save();
                return response()->json(['status'=>204]);   
            }
        } 
        catch (\Throwable $th) 
        {
            return response()->json(['status'=>400]);   

        }
    }

    public function getImage($id)
    {
        if(isset($id) && !empty($id))
        {
            $certificate = (new Certification())->find($id);
            if($certificate)
            {
                return response()->json([
                    'status'    => true,
                    'image' => $certificate->image
                ]);
            }
            else
                return response()->json(['status'  => false,'message'   => 'Image Not Found']);
        }
    }

    public function delete($ids)
    {
        $image_path = 'app-assets/images/certification/';
        if($ids)
        {
            $certificates = (new Certification())->whereIn('id',$ids)->get();
            if(isset($certificates))
            {
                foreach($certificates as $certificate)
                {
                    $image = $image_path.$certificate->image;
                    if(File::exists($image))
                        File::delete($image);
                    $certificate->delete();
                }
                return redirect()->route('certificate.index')->withSuccess('Certificate Deleted!');
            }
        }
        else
            return redirect()->route('certificate.index')->withWarning('Please select at least one item!');

    }
    
    public function edit($id)
    {
        if(isset($id))
        {
            $certificate = (new Certification())->find(decryptParams($id));
            if(isset($certificate))
                return view('app.admin-panel.certifications.edit',compact('certificate'));
            else
                return redirect()->route('certificate.index')->withWarning('Certificate Not Found!');
            
        }
    }

    public function update($data,$id)
    {
        $image_path = 'app-assets/images/certification/';
        $image = null;
        $certificate = (new Certification())->find($id);
        try
        {
            if($data['image'] != null)
            {
                File::delete($image_path.$certificate->image);
                $this->image = $this->imageStoreUniqueName($this->certificate_image_path,$data['image'] ?? '');
            }
            else    
                $this->image = $certificate->image;
        }
        catch (\Exception $ex)
        {
            $this->image = $certificate->image;
        }
        
        try
        {
            $certificate->description = $data['description'];
            $certificate->image = $this->image;
            $certificate->save();
            return response()->json(['status'=>200]); 
        }
        catch(Exception $ex)
        {
            return response()->json(['status'=>400]); 
        }
            
    }
}
