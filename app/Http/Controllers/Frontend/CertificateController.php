<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\ActorProduct;
use App\Models\Banner;
use App\Models\Certification;
use App\Models\Collection;
use App\Models\Color;
use App\Models\ReplacementCycle;
use App\Models\Store;
use App\Models\Style;
use App\Models\Type;

class CertificateController extends Controller
{
    public function index() : View
    {
        $certificates = Certification::select('description','image')->get();
        $data =
            [
                'colors'        => Color::all(),
                'collections'   => Collection::all(),
                'actors'        => ActorProduct::all(),
                'types'         => Type::all(),
                'styles'        => Style::all(),
                'wear_cycles'   => ReplacementCycle::all(),
                'banner'        => Banner::all(),
                'stores'        => Store::orderBy('order', 'Asc')->get(),
                'certificates'  => $certificates
            ];
        return view('app.front-end.certifications.index',compact('data'));
    }
}
