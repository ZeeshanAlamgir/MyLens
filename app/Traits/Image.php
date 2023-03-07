<?php

namespace App\Traits;
use Illuminate\Support\Facades\File;

trait Image
{
    public function imageStore($path,$file)
    {
        if($file)
        {
            $fileName = $file->getClientOriginalName();
            $file->move(public_path($path),$fileName);
            return $fileName;
        }
    }
    public function imageStoreUniqueName($path,$file)
    {
        if($file)
        {
            $fileName = time().$file->getClientOriginalName();
            $file->move(public_path($path),$fileName);
            return $fileName;
        }
    }
}
