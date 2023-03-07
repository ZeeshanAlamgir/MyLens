<?php

namespace App\Repositories\Services;

use App\Models\Collection;
use App\Repositories\Interfaces\CollectionInterface;
use App\Traits\Image;
use Illuminate\Support\Facades\File;
use Exception;

class CollectionService implements CollectionInterface
{
    use Image;

    protected $banner_path = 'app-assets/images/collections/banner/';
    protected $image_path = 'app-assets/images/collections/images/';

    public function store($data)
    {
        try 
        {
            // if($data['name'] !=null && $data['description'] !=null && $data['banner'] !=null && $data['image'] !=null)
            if(isset($data))
            {
                // $collection_slugs = Collection::get(['slug']);
                // foreach($collection_slugs as $collection_slug)
                // {
                //     if($collection_slug->slug == $data['slug'])
                //     {
                //         return response()->json(['slug'=>1]);       
                //     }
                // }
                $collection = (new Collection());
                $slug = checkSlug($collection,$data['slug']);
                $collection->name = $data['name'];
                $collection->description = $data['description'];
                $collection->slug = $slug;
                $collection->banner = $this->imageStoreUniqueName($this->banner_path,$data['banner']) ?? '';
                $collection->image = $this->imageStoreUniqueName($this->image_path,$data['image']) ?? '';
                $collection->save();
                return redirect()->route('collection.index')->withSuccess('Collection Added Succeessfully...');
                // return response()->json(['status'=>204]);   
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
            $collection = (new Collection())->find($id);
            if ($collection) 
            {
                return response()->json([
                    'status' => true,
                    'data' => $collection->image
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

    public function getBanner($id)
    {
        try 
        {
            $collection = (new Collection())->find($id);
            if ($collection) 
            {
                return response()->json([
                    'status' => true,
                    'data' => $collection->banner
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
            $collection = (new Collection())->find(decryptParams($id));
            if ($collection && !empty($collection)) 
                return view('app.admin-panel.collections.edit', ['collection' => $collection]);
            return redirect()->route('collection.index')->withWarning('Data Not Found!');
        } 
        catch (Exception $ex) 
        {
            return redirect()->route('collection.index')->withDanger('Something went wrong!' . ' ' . $ex->getMessage());
        }
    }

    public function update($data, $id)
    {
        $image_path = 'app-assets/images/collections/images/';
        $banner_path = 'app-assets/images/collections/banner/';
        $image = null;
        $banner= null;
        $collection = (new Collection())->find($id);
        try 
        {
            if($data['name'] !=null && $data['description'] !=null && $data['banner'] !=null && $data['image'] !=null)
            {
                if($data['banner'] != null && !empty($data['banner']))
                {
                    File::delete($banner_path.$collection->banner);
                    $this->banner = $this->imageStoreUniqueName($this->banner_path,$data['banner']) ?? '';
                }
                else
                    $this->banner = $collection->banner;
                
                if($data['image'] != null && !empty($data['image']))
                {
                    File::delete($image_path.$collection->image);
                    $this->image = $this->imageStoreUniqueName($this->image_path,$data['image']) ?? '';
                }
                else
                    $this->image = $collection->image;
                    
                $collection->name = $data['name'];
                $collection->description = $data['description'];
                $collection->slug = $data['slug'];
                $collection->banner = $this->banner;
                $collection->image = $this->image;
                $collection->save();
                return response()->json(['status'=>200]); 
            }
            else
                return response()->json(['status'=>400]); 
        } 
        catch (\Throwable $th) 
        {
            return response()->json(['status'=>400]); 
        }
    }

    public function destroy($ids)
    {
        try 
        {
            if ($ids) 
            {
                $collections = (new Collection())->whereIn('id', $ids)->get();
                foreach($collections as $collection)
                {
                    File::delete($this->banner_path.$collection->banner);
                    File::delete($this->image_path.$collection->image);
                    $collection->delete();
                }
                return redirect()->route('collection.index')->withSuccess('Collection Deleted!');
            } 
            else
                return redirect()->route('collection.index')->withWarning('Please select at least one item!');
        } 
        catch (Exception $ex) 
        {
            return redirect()->route('collection.index')->withDanger('Something went wrong!' . ' ' . $ex->getMessage());
        }
    }

    
}
