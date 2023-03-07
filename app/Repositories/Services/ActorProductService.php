<?php

namespace App\Repositories\Services;

use App\Models\ActorProduct;
use App\Models\Product;
use App\Repositories\Interfaces\ActorProductInterface;
use App\Traits\Image;
use Exception;
use Illuminate\Support\Facades\File;

class ActorProductService implements ActorProductInterface
{
    use Image;
    protected $image_path = 'app-assets/images/actor-product/';
    public function store(array $data)
    {
        try 
        {
            if($data['name'] !=null && $data['image'] !=null && $data['product_id'] !=null)
            {
                $actor_product = (new ActorProduct());
                $actor_product->name = $data['name'];
                $actor_product->product_id = $data['product_id'];
                $actor_product->image = $this->imageStoreUniqueName($this->image_path,$data['image'] ?? '');
                $actor_product->save();
                // return response()->json(['status'=>204]);
                return redirect()->route('actor-product.index')->withSuccess('Actor Saved Successfully...');
            }    
            // else
                // return response()->json(['status'=>400]);    
        } 
        catch (\Exception $ex) 
        {
            return redirect()->back()->withDanger('AError.'.$ex->getMessage());

            // return response()->json(['status'=>400]);    
        }
    }

    public function getImage($id)
    {
        try 
        {
            $actor_product = (new ActorProduct())->find($id);
            if ($actor_product) 
            {
                return response()->json([
                    'status' => true,
                    'data' => $actor_product->image
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
        $product_id = [];
        try 
        {
            $actor_product = (new ActorProduct())->find((int)decryptParams($id));
            array_push($product_id,$actor_product->product_id);
            $products = Product::all();
            if (isset($actor_product) && !empty($actor_product)) 
                return view('app.admin-panel.actor-product.edit', ['actor_product' => $actor_product, 'products'  => $products, 'product_id'=>$product_id]);
            return redirect()->route('actor-product.index')->withWarning('Data Not Found!');
        } 
        catch (Exception $ex) 
        {
            return redirect()->route('actor-product.index')->withDanger('Something went wrong!' . ' ' . $ex->getMessage());
        }
    }

    public function update(array $data,$id)
    {
        $image_path = 'app-assets/images/actor-product/';
        $image = null;
        $actor_product = (new ActorProduct())->find($id);
        try 
        {
            if($data['name'] !=null && $data['product_id'] !=null && $data['image'] !=null)
            {
                if($data['image'] != null)
                    File::delete($image_path.$actor_product->image);
                else
                    $image = $actor_product->image;

                $actor_product->name = $data['name'];
                $actor_product->product_id = $data['product_id'];
                $actor_product->image = $this->imageStoreUniqueName($this->image_path,$data['image'] ?? '');
                $actor_product->save();
                return response()->json(['status'=>201]);
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
                $actor_products = (new ActorProduct())->whereIn('id', $ids)->get();
                foreach($actor_products as $actor_product)
                {
                    File::delete($this->image_path.$actor_product->image);
                    $actor_product->delete();
                }
                return redirect()->route('actor-product.index')->withSuccess('Actor Product Deleted!');
            } 
            else
                return redirect()->route('actor-product.index')->withWarning('Please select at least one item!');
        } 
        catch (Exception $ex) 
        {
            return redirect()->route('actor-product.index')->withDanger('Something went wrong!' . ' ' . $ex->getMessage());
        }
    }
}
