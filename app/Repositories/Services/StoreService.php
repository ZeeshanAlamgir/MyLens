<?php

namespace App\Repositories\Services;

use App\Models\Store;
use App\Models\StoreCity;
use App\Repositories\Interfaces\StoreInterface;

class StoreService implements StoreInterface
{
    public function store($data)
    {
        try {
            (new Store())->create([
                'name'      => $data['name'],
                'address'   => $data['address'],
                'latitude'  => $data['latitude'],
                'longitude' => $data['longitude'],
                'order' => $data['order'],
                'city_id' => $data['city_id'],
            ]);
            return redirect()->route('store.index')->withSuccess('Store Added...');
            // return response()->json(['status' => 204]);
        } catch (\Exception $ex) {
            return redirect()->back()->withDanger('Error.'.$ex->getMessage());
            // return response()->json(['status' => 400]);
        }
    }

    public function edit($id)
    {
        $city_id = [];
        $store = (new Store())->find(decryptParams($id));
        array_push($city_id,$store->city_id);
        $cities = StoreCity::all();
        try {
            if (isset($store) && !empty($store))
                return view('app.admin-panel.stores.edit', ['store' => $store,'cities'=>$cities,'city_id'=>$city_id]);
            return redirect()->route('store.index')->withWarning('Data Not Found!');
        } catch (\Exception $ex) {
            return redirect()->route('store.index')->withDanger('Something went wrong!' . ' ' . $ex->getMessage());
        }
    }

    public function update($data, $id)
    {
        $store = (new Store())->find($id);
        try {
            if (isset($store) && !empty($store)) {
                $store->name = $data['name'];
                $store->address = $data['address'];
                $store->latitude = $data['latitude'];
                $store->longitude = $data['longitude'];
                $store->order = $data['order'];
                $store->city_id = $data['city_id'];
                $store->save();
                return response()->json(['status' => 200]);
            }
        } catch (\Exception $ex) {
            return response()->json(['status' => 400]);
        }
    }

    public function destroy($ids)
    {
        try {
            if ($ids) {
                $stores = (new Store())->whereIn('id', $ids)->get();
                foreach ($stores as $store) {
                    $store->delete();
                }
                return redirect()->route('store.index')->withSuccess('Store Deleted!');
            } else
                return redirect()->route('store.index')->withSuccess('Store Deleted!');
        } catch (\Exception $ex) {
            return redirect()->route('store.index')->withDanger('Something went wrong!' . ' ' . $ex->getMessage());
        }
    }
}
