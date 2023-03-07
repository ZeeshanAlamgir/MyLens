<?php

namespace App\Repositories\Services;

use App\Models\ActorProduct;
use App\Models\Collection;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductGallery;
use App\Models\ProductType;
use App\Models\ReplacementCycle;
use App\Models\Style;
use App\Models\Tone;
use App\Models\Type;
use App\Repositories\Interfaces\ProductInterface;
use App\Traits\Image;
use Illuminate\Support\Facades\File;

class ProductService implements ProductInterface
{
    use Image;
    protected $image_path = 'app-assets/images/products/images/';
    protected $before_image_path = 'app-assets/images/products/before/';
    protected $after_image_path = 'app-assets/images/products/after/';
    protected $gallery_path = 'app-assets/images/products/gallery/';
    public function store($data)
    {
        try 
        {
            if($data!=null)
            {
                //Product
                $product = new Product();
                $slug = checkSlug($product, $data['slug']);
                $product->name = $data['name'];
                $product->slug = $slug;
                $product->description = $data['description'];
                // $product->price = $data['price'] ?? 0;
                // $product->price_by = $data['price_by'] ?? 0;
                $product->image = $this->imageStoreUniqueName($this->image_path,$data['image']);
                $product->before_image = $this->imageStoreUniqueName($this->before_image_path,$data['before_image']);
                $product->after_image = $this->imageStoreUniqueName($this->after_image_path,$data['after_image']);
                $product->collection_id = (int)$data['collection_id'];
                $product->replacement_cycle_id = (int)$data['replacement_cycle_id'];
                $product->tone_id = (int)$data['tone_id'];
                $product->style_id = (int)$data['style_id'];
                $product->lens_material = json_encode($data['lens_material']);
                // $product->features = $data['features'] ?? NULL;
                $product->base_curve = $data['base_curve'];
                $product->diameter = $data['diameter'];
                $product->oxygen_permeability = $data['oxygen_permeability'];
                $product->center_thickness = $data['center_thickness'];
                $product->power = $data['power'];
                $product->before_after_description = $data['before_after_description'];
                $product->buy_product_online_link = $data['buy_product_online_link'];
                $product->save();
                
                //Product Colors
                foreach($data['color_id'] as $color)
                {
                    $product_color = new ProductColor();
                    $product_color->product_id = (int)$product->id;
                    $product_color->color_id   = (int)$color;
                    $product_color->save();
                }
    
                //Product Types
                foreach($data['type_id'] as $type)
                {
                    $product_type = new ProductType();
                    $product_type->product_id = (int)$product->id;
                    $product_type->type_id   = (int)$type;
                    $product_type->save();
                }   
    
                //Product Gallery
                foreach($data['galleries'] as $gallery)
                {
                    // dd($gallery);
                    $product_gallery = new ProductGallery();
                    $product_gallery->product_id = (int)$product->id;
                    $product_gallery->image = $this->imageStoreUniqueName($this->gallery_path,$gallery);
                    $product_gallery->save();
                }
                // return response()->json(['status'=>204]);
                return redirect()->route('product.index')->withSuccess('Product Added Successfully...');
            }
            else
            {
                // dd('error');
                // return response()->json(['status'=>400]);
            }
            //Product
        }
        catch (\Exception $ex) 
        {
            return redirect()->back()->withDanger('Error...'.$ex->getMessage());
            // return response()->json(['status'=>400]);
        }
    }

    public function getImage($id)
    {
        try 
        {
            $product = (new Product())->find($id);
            if(isset($product) && !empty($product))
            {
                return response()->json([
                    'status'    => true,
                    'data'      => $product->image
                ]);
            }
            
        } 
        catch (\Exception $ex) 
        {
            return response()->json(['status'=>false]);
        }
    }

    public function productDetails($id)
    {
        try
        {
            $product = (new Product())->with(['collection:id,name','style:id,label','replacement_cycle:id,name','tone:id,label','colors:id,name','types:id,label','gallery:id,image,product_id'])->find($id);
            $lens_material = json_decode($product['lens_material']);
            if(isset($product) && !empty($product))
            {
                return response()->json([
                    'status'    =>  true,
                    'data'      => $product,
                    'lens_material' => $lens_material
                ]);
            }
        } 
        catch (\Throwable $th) 
        {
            return response()->json(['status'=>false]);
        }
    }

    public function edit($id)
    {
        $color_ids = array();
        $type_ids = array();
        $tone_id = array();
        $style_id = array();
        $replacement_cycle_id = array();
        $collection_id = array();
        try 
        {
            $product =  (new Product())->with(['collection:id,name','style:id,label','replacement_cycle:id,name','tone:id,label','colors:id,name','types:id,label','gallery:id,image,product_id'])->find(decryptParams($id));

            $lens_materials = json_decode($product['lens_material']);
            foreach($product['colors'] as $color)
            {
                array_push($color_ids,$color['id']);
            }

            foreach($product['types'] as $type)
            {
                array_push($type_ids,$type['id']);
            }
            array_push($tone_id,$product->tone_id);
            array_push($style_id,$product->style_id);
            array_push($replacement_cycle_id,$product->replacement_cycle_id);
            array_push($collection_id,$product->collection_id);

            $data = [
                'colors'                => Color::all(),
                'types'                 => Type::all(),
                'tones'                 => Tone::all(),
                'styles'                => Style::all(),
                'replacement_cycle'     => ReplacementCycle::all(),
                'collections'           => Collection::all(),
                'selected_colors'       =>  $color_ids,
                'selected_types'        =>  $type_ids,
                'selected_tone'         =>  $tone_id,
                'selected_style'        =>  $style_id,
                'selected_rep_id'       => $replacement_cycle_id,
                'selected_collection'   => $collection_id,
                'lens_materials'        => $lens_materials
            ];
            if(isset($product) && !empty($product))
                return view('app.admin-panel.product.edit',['product' => $product, 'data'   => $data]);
            return redirect()->route('product.index')->withWarning('Data Not Found!');
        } 
        catch (\Exception $ex)
        {
            return redirect()->route('product.index')->withDanger('Something went wrong!' . ' ' . $ex->getMessage());
        }
    }

    public function update(array $data, $id)
    {
        $image = null;
        $before_image = null;
        $after_image = null;
        $prod_gallery = ProductGallery::where('product_id',$id)->get();
        try 
        {
            // if($data['name'] !=null && $data['description'] !=null && $data['price'] !=null && $data['price_by'] !=null && $data['image'] !=null
            // && $data['collection_id'] !=null && $data['replacement_cycle_id'] !=null && $data['tone_id'] !=null && $data['style_id'] !=null
            // && $data['features'] !=null && $data['color_id'] !=null && $data['type_id'] !=null && $data['galleries'] !=null)
            if($data!=null)
            {
                //Product
                $product = (new Product())->find($id);
                $path = $this->image_path.$product->image;
                $before = $this->before_image_path.$product->before_image;
                $after = $this->after_image_path.$product->after_image;
                if(File::exists($path))
                {
                    File::delete($path);
                    // $image = $this->imageStoreUniqueName($this->image_path,$data['image']);
                }
                else
                    $image = $product->image;
                
                if(File::exists($before))
                {
                    File::delete($before);
                    // $image = $this->imageStoreUniqueName($this->image_path,$data['image']);
                }
                else
                    $before_image = $product->before_image;

                if(File::exists($after))
                {
                    File::delete($after);
                    // $image = $this->imageStoreUniqueName($this->image_path,$data['image']);
                }
                else
                    $after_image = $product->after_image;
                $product->name = $data['name'];
                $product->slug = $data['slug'];
                $product->description = $data['description'];
                // $product->price = $data['price'] ?? 0;
                // $product->price_by = $data['price_by'] ?? NULL;
                $product->image = $this->imageStoreUniqueName($this->image_path,$data['image']);
                $product->before_image = $this->imageStoreUniqueName($this->before_image_path,$data['before_image']);
                $product->after_image = $this->imageStoreUniqueName($this->after_image_path,$data['after_image']);
                $product->collection_id = (int)$data['collection_id'];
                $product->replacement_cycle_id = (int)$data['replacement_cycle_id'];
                $product->tone_id = (int)$data['tone_id'];
                $product->style_id = (int)$data['style_id'];
                $product->lens_material = json_encode($data['lens_material']);
                // $product->features = $data['features'];
                $product->base_curve = $data['base_curve'];
                $product->diameter = $data['diameter'];
                $product->oxygen_permeability = $data['oxygen_permeability'];
                $product->center_thickness = $data['center_thickness'];
                $product->power = $data['power'];
                $product->before_after_description = $data['before_after_description'];
                // $product->features = $data['features'] ?? NULL;
                $product->buy_product_online_link = $data['buy_product_online_link'];
                $product->save();
    
                //Product Colors
                foreach($product->colors as $pivot_color)
                {
                    $pivot_color->pivot->delete();
                }
                foreach($data['color_id'] as $color)
                {
                    $product_color = new ProductColor();
                    $product_color->product_id = (int)$product->id;
                    $product_color->color_id   = (int)$color;
                    $product_color->save();
                }
    
                //Product Types
                foreach($product->types as $pivot_type)
                {
                    $pivot_type->pivot->delete();
                }
                foreach($data['type_id'] as $type)
                {
                    $product_type = new ProductType();
                    $product_type->product_id = (int)$product->id;
                    $product_type->type_id   = (int)$type;
                    $product_type->save();
                }   
                
                //Product Gallery
                foreach($product->gallery as $gallery)
                {
                    $gallery_path = $this->gallery_path.$gallery->image;
                    if(File::exists($gallery_path))
                        File::delete($gallery_path);
                }
                foreach($prod_gallery as $gallery)
                {
                    $gallery->delete();
                }
                foreach($data['galleries'] as $gallery)
                {
                    $product_gallery = new ProductGallery();
                    $product_gallery->product_id = (int)$product->id;
                    $product_gallery->image = $this->imageStoreUniqueName($this->gallery_path,$gallery);
                    $product_gallery->save();
                }
                return response()->json(['status'=>204]);
            }
            else
                return response()->json(['status'=>400]);
        }
        catch (\Exception $ex) 
        {
            return response()->json(['status'=>400,'message'=>$ex->getMessage()]);
        }
    }

    public function destroy($ids)
    {
        try 
        {
            if($ids)
            {
                $products = (new Product())->with(['colors','types','gallery'])->whereIn('id',$ids)->get();
                foreach($products as $product)
                {
                    $actor_product_exists = ActorProduct::where('product_id',$product->id)->count();
                    if($actor_product_exists > 0)
                    {
                        return redirect()->back()->withInfo('Please Delete Celebrity First...');
                    }
                    foreach($product->gallery as $gallery)
                    {
                        $gallery_images__path  = 'app-assets/images/products/gallery/'.$gallery->image;
                        if(File::exists($gallery_images__path))
                        {
                            File::delete($gallery_images__path);
                            $gallery->delete();
                        }
                    }
                    foreach($product->colors as $color)
                    {
                        $color->pivot->delete();
                    }
                    foreach($product->types as $type)
                    {
                        $type->pivot->delete();
                    }
                    $image_path = 'app-assets/images/products/images/'.$product->image;
                    if(File::exists($image_path))
                    {
                        File::delete($image_path);
                    }
                    $product->delete();
                }
                return redirect()->route('product.index')->withSuccess('Product Deleted!');
            }
            else
                return redirect()->route('product.index')->withSuccess('Product Deleted!');
        } 
        catch (\Exception $ex) 
        {
            return redirect()->route('product.index')->withDanger('Something went wrong!' . ' ' . $ex->getMessage());
        }
    }

    public function beforeImage($id)
    {
        if(isset($id))
        {
            $product = (new Product())->find($id);
            if(isset($product))
            {
                return response()->json([
                    'status'    => true,
                    'before'     => $product->before_image
                ]);
            }
            else
                return response()->json(['status'   => false]);
        }
    }

    public function afterImage($id)
    {
        if(isset($id))
        {
            $product = (new Product())->find($id);
            if(isset($product))
            {
                return response()->json([
                    'status'    => true,
                    'after'     => $product->after_image
                ]);
            }
            else
                return response()->json(['status'   => false]);
        }
    }
}
