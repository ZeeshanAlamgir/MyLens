<?php

namespace App\Repositories\Services;

use App\Models\BecomeSeller;
use App\Repositories\Interfaces\BecomeSellerInterface;
use Exception;

class BecomeSellerService implements BecomeSellerInterface
{
    public function update(array $data)
    {
        if(isset($data))
        {
            try
            {
                $become_seller = null;
                if($data['id'] > 0){
                    $become_seller = (new BecomeSeller())->find($data['id']);
                }

                if(!$become_seller){
                    $become_seller = (new BecomeSeller())->create([
                        'title' => $data['title'],
                        'href' => $data['href']
                    ]);
                }
                else{

                    $become_seller->title = $data['title'];
                    $become_seller->href = $data['href'];
                    $become_seller->update();

                }

                return response()->json(
                    [
                        'status'    => true,
                        'message'   => 'Data Updated Successfully.'
                    ]
                );
            }
            catch (Exception $th)
            {
                return response()->json(
                    [
                        'status'    => false,
                        'message' => $th->getMessage()
                    ]
                );
            }
        }
    }
}
