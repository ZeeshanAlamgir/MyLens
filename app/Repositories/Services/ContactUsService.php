<?php

namespace App\Repositories\Services;

use App\Models\ContactUs;
use App\Repositories\Interfaces\ContactUsInterface;

class ContactUsService implements ContactUsInterface
{
    public function store($data)
    {
        if(isset($data) && !is_null($data))
        {
            $contact_us = (new ContactUs());
            $contact_us->full_name = $data['full_name'];
            $contact_us->email = $data['email'];
            $contact_us->shop_name = $data['shop_name'];
            $contact_us->city_name = $data['city_name'];
            $contact_us->subject = $data['subject'];
            $contact_us->message = $data['message'];
            $contact_us->save();
            return response()->json(['status'=>204]); 
        }
        else
            return response()->json(['status'=>400]); 
    }
}
