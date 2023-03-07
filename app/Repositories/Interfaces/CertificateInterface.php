<?php

namespace App\Repositories\Interfaces;

interface CertificateInterface
{
    public function store(array $data);
    public function getImage($id);
    public function delete($id);
    public function edit($id);
    public function update($id,$data);
}
