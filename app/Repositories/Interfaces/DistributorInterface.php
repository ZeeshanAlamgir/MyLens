<?php

namespace App\Repositories\Interfaces;

interface DistributorInterface
{
    public function store(array $data);
    public function getImage($id);
    public function edit($id);
    public function update(array $data,$id);
    public function destroy($data);
}
