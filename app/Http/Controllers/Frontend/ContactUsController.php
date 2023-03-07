<?php

namespace App\Http\Controllers\Frontend;

use App\DataTables\ContactUs\ContactUsDataTable;
use App\Http\Controllers\Controller;
use App\Models\ActorProduct;
use App\Models\Banner;
use App\Models\BecomeSeller;
use App\Models\Collection;
use App\Models\Color;
use App\Models\CountryFlag;
use App\Models\ReplacementCycle;
use App\Models\Store;
use App\Models\StoreCity;
use App\Models\Style;
use App\Models\Type;
use App\Repositories\Interfaces\ContactUsInterface;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    protected $contactUs = null;
    public function __construct(ContactUsInterface $contactUsInterface)
    {
        $this->contactUs = $contactUsInterface;
    } 
    
    public function index(ContactUsDataTable $contactUsDataTable)
    {
        return $contactUsDataTable->render('app.admin-panel.contact-us.index');
    }

    public function create()
    {
        $data =
            [
                'colors'        => Color::all(),
                'collections'   => Collection::all(),
                'actors'        => ActorProduct::all(),
                'types'         => Type::all(),
                'styles'        => Style::all(),
                'wear_cycles'   => ReplacementCycle::all(),
                'banner'        => Banner::all(),
                'stores' => Store::orderBy('order', 'Asc')->get(),
                'become_seller'         => BecomeSeller::first(),
                'cities'        => StoreCity::all(),
                'country_flag'  => CountryFlag::first()    

            ];
        return view('app.front-end.contact.contact-us',compact('data'));
    }

    public function store(Request $request)
    {
        return $this->contactUs->store($request->all());
    }
}
