<?php

namespace App\Http\Controllers\Admin\BecomeSeller;

use App\Http\Controllers\Controller;
use App\Models\BecomeSeller;
use App\Repositories\Interfaces\BecomeSellerInterface;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BecomeSellerController extends Controller
{
    protected $becomeSeller = '';
    public function __construct(BecomeSellerInterface $becomeSellerInterface)
    {
        $this->becomeSeller = $becomeSellerInterface;
    }

    public function create() :View
    {
        $become_seller  = BecomeSeller::first();

        return view('app.admin-panel.become-seller.create',
        [
            'become_seller' => $become_seller
        ]);
    }

    public function update(Request $request)
    {
        return $this->becomeSeller->update($request->all());
    }
}
