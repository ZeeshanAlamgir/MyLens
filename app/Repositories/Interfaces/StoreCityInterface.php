<?php

namespace App\Repositories\Interfaces;

interface StoreCityInterface
{
    public function store($data);
    public function delete($id);
    public function edit($id);
    public function update($id,$data);
}
