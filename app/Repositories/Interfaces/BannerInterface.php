<?php

namespace App\Repositories\Interfaces;

interface BannerInterface
{
    public function store(array $data);
    public function getImages($id);
    public function edit($id);
    public function update(array $data,$id);
    public function delete($ids);
}
