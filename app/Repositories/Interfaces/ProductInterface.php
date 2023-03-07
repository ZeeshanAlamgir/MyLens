<?php

namespace App\Repositories\Interfaces;

interface ProductInterface
{
    public function store(array $data);
    public function getImage($id);
    public function productDetails($id);
    public function edit($id);
    public function update(array $data, $id);
    public function destroy($id);
    public function beforeImage($id);
    public function afterImage($id);
}
