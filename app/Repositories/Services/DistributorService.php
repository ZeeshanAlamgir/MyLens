<?php

namespace App\Repositories\Services;

use App\Models\City;
use App\Models\Distributor;
use App\Models\Phone;
use App\Repositories\Interfaces\DistributorInterface;
use App\Traits\Image;
use Exception;
use Illuminate\Support\Facades\File;

class DistributorService implements DistributorInterface
{
    use Image;
    protected $image_path = 'app-assets/images/distributor/images/';
    public function store(array $data)
    {
        try 
        {
            if($data['name'] !=null && $data['image'] !=null  && $data['company'] !=null && $data['email'] !=null && $data['address'] !=null && $data['instagram_link'] !=null && $data['website_link'] !=null)
            {
                $lens_distributor = (new Distributor());
                $lens_distributor->name = $data['name'];
                $lens_distributor->image = $this->imageStoreUniqueName($this->image_path,$data['image'] ?? '');
                $lens_distributor->company = $data['company'];
                $lens_distributor->email = $data['email'];
                $lens_distributor->address = $data['address'];
                $lens_distributor->instagram_link = $data['instagram_link'];
                $lens_distributor->website_link = $data['website_link'];
                $lens_distributor->save();

                foreach($data['city_name'] as $key => $city)
                {
                    $city_model = (new City());
                    $city_model->name = $city;
                    $city_model->distributor_id = $lens_distributor->id;
                    $city_model->save();

                    if($city_model)
                    {
                        $index = $data['city_indexes'][$key];
                        $phones = $data['phone_no_' . $index];
                        foreach ($phones as $key2 => $phone)
                        {
                            $phone_model = (new Phone());
                            $phone_model->phone_no = $phone; 
                            $phone_model->city_id = $city_model->id; 
                            $phone_model->save(); 
                        }
                    }
                }
                return response()->json(['status'=>204]); 
            }   
            else
               return response()->json(['status'=>400]);    
        } 
        catch (\Exception $th) 
        {
            return response()->json(['status'=>400]);    
        }
    }

    public function getImage($id)
    {
        try 
        {
            $distributor = (new Distributor())->find($id);
            if ($distributor) 
            {
                return response()->json([
                    'status' => true,
                    'data' => $distributor->image
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
            $distributor = (new Distributor())->with('cities.phones')->find(decryptParams($id));
            if (isset($distributor) && !empty($distributor)) 
                return view('app.admin-panel.distributors.edit', ['distributor' => $distributor]);
            return redirect()->route('distributor.index')->withWarning('Data Not Found!');
        } 
        catch (Exception $ex) 
        {
            return redirect()->route('distributor.index')->withDanger('Something went wrong!' . ' ' . $ex->getMessage());
        }
    }

    public function update(array $data,$id)
    {
        // dd($data);
        $image_path = 'app-assets/images/distributor/images/';
        $image = null;
        $distributor = (new Distributor())->with('cities.phones')->find($id);
        // dd($distributor);
        // foreach($distributor as $dist)
        // {
        //     // dd($dist['id']);
        // }

        // $distributor->name = 'Lanka';
        // $distributor->save();
        // dd($distributor);

        //Image
        try 
        {
            if($data['name'] !=null && $data['image'] !=null && $data['email'] !=null && $data['address'] !=null && $data['instagram_link'] !=null && $data['website_link'] !=null)
            {

                // foreach($distributor as $dist)
                // {
                    if(isset($distributor) && !empty($distributor))
                    {
                        foreach($distributor['cities'] as $city)
                        {
                            // dd($city);
                            if(isset($city) && !empty($city))
                            {
                                foreach($city['phones'] as $phone)
                                {
                                    // dd($phone);
                                    $phone->delete();
                                }
                            }
                            $city->delete();
                        }
                    }
                    if($data['image'] != null)
                    {
                        File::delete($image_path.$distributor->image);
                    }
                    else
                        $this->image = $distributor->image;

                $distributor->name = $data['name'];
                $distributor->image = $this->imageStoreUniqueName($this->image_path,$data['image'] ?? '');
                $distributor->company = $data['company'];
                $distributor->email = $data['email'];
                $distributor->address = $data['address'];
                $distributor->instagram_link = $data['instagram_link'];
                $distributor->website_link = $data['website_link'];
                $distributor->save();

                foreach($data['city_name'] as $key => $city)
                {
                    $city_model = (new City());
                    $city_model->name = $city;
                    $city_model->distributor_id = $distributor->id;
                    $city_model->save();

                    if($city_model)
                    {
                        $index = $data['city_indexes'][$key];
                        $phones = $data['phone_no_' . $index];
                        foreach ($phones as $key2 => $phone)
                        {
                            $phone_model = (new Phone());
                            $phone_model->phone_no = $phone; 
                            $phone_model->city_id = $city_model->id; 
                            $phone_model->save(); 
                        }
                    }
                }
                return response()->json(['status'=>201]);
            }
            else
                return response()->json(['status'=>400]);
        } 
        catch (\Exception $ex) 
        {   
            // dd($ex);
            return response()->json(['status'=>400]);
        }
    }
    
    public function destroy($request)
    {
        try 
        {
            if ($request) 
            {
                $distributors = (new Distributor())->with('cities.phones')->whereIn('id', $request)->get();
                foreach($distributors as $distributor)
                {
                    if(isset($distributor) && !empty($distributor))
                    {
                        foreach($distributor['cities'] as $cities)
                        {
                            if(isset($cities) && !empty($cities))
                            {
                                foreach($cities['phones'] as $phone)
                                {
                                    $phone->delete();
                                }
                            }
                            $cities->delete();
                        }
                    }
                    if(isset($distributor) && !empty($distributor))
                    {
                        File::delete($this->image_path.$distributor->image);
                        $distributor->delete();
                    }
                }
                return redirect()->route('distributor.index')->withSuccess('Distributor Deleted!');
            } 
            else
                return redirect()->route('distributor.index')->withWarning('Please select at least one item!');
        } 
        catch (Exception $ex) 
        {
            return redirect()->route('distributor.index')->withDanger('Something went wrong!' . ' ' . $ex->getMessage());
        }
    }
}