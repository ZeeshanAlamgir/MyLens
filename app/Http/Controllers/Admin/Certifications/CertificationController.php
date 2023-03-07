<?php

namespace App\Http\Controllers\Admin\Certifications;

use App\DataTables\Certificate\CertificateDataTable;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\CertificateInterface;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CertificationController extends Controller
{
    protected $certificate = null;
    public function __construct(CertificateInterface $certificateInterface)
    {
        $this->certificate = $certificateInterface;
    }

    public function index(CertificateDataTable $certificateDataTable)
    {
        return $certificateDataTable->render('app.admin-panel.certifications.index');
    }

    public function create() : View
    {
        return view('app.admin-panel.certifications.create');
    }

    public function store(Request $request)
    {
        return $this->certificate->store($request->all());
    }

    public function getImage(Request $request)
    {
        return $this->certificate->getImage($request->input('id'));
    }

    public function delete(Request $request)
    {
        return $this->certificate->delete($request->input('chkData'));
    }

    public function edit($id)
    {
        return $this->certificate->edit($id);
    }

    public function update(Request $request ,$id)
    {
        return $this->certificate->update( $request->all(), $id);
    }
}
