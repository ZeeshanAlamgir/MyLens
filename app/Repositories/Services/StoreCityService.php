<?php

namespace App\Repositories\Services;

use App\Models\StoreCity;
use App\Repositories\Interfaces\StoreCityInterface;
use Exception;

class StoreCityService implements StoreCityInterface
{
    public function store($request)
    {
        try
        {
            (new StoreCity())->create([
                'name'  => $request['name']
            ]);
            return redirect()->route('city.index')->withSuccess('Data Saved!');
        }
        catch(Exception $ex)
        {
            return redirect()->route('city.index')->withDanger('Something went wrong!' . ' ' . $ex->getMessage());
        }
    }

    public function delete($ids)
    {
        try
        {
            if($ids) 
            {
                $store_cities = (new StoreCity())->find($ids);
                foreach($store_cities as $store_city)
                    $store_city->delete();
                return redirect()->route('city.index')->withSuccess('Data deleted!');
            } 
            else
            {
                return redirect()->route('city.index')->withWarning('Please select at least one item!');
            }
        }
        catch(Exception $ex)
        {
            return redirect()->route('city.index')->withDanger('Something went wrong!' . ' ' . $ex->getMessage());
        }
    }

    public function edit($id)
    {
        try 
        {
            $store_city = (new StoreCity())->find(decryptParams($id));
            if(isset($store_city) && !empty($store_city))
                return view('app.admin-panel.store-city.edit',['store_city'=>$store_city]);
            return redirect()->route('city.index')->withWarning('Data Not Found!');
        } 
        catch (Exception $ex) 
        {
            return redirect()->route('city.index')->withWarning('Data Not Found!', ' ' . $ex->getMessage());
        }
    }

    public function update($id,$data)
    {
        try 
        {
            $store_city = (new StoreCity())->find(decryptParams($id));
            $store_city->name = $data['name'];
            $store_city->save();
            return redirect()->route('city.index')->withSuccess('Data Updated!');
        } 
        catch (Exception $ex)
        {
            return redirect()->route('city.edit',['id'=>$id])->withWarning('Data Not Found!', ' ' . $ex->getMessage());
        }
    }
}
