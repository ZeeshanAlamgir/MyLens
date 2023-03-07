<?php

namespace App\Repositories\Interfaces;

interface TypeInterface
{
    public function store(array $data);
    public function edit($id);
    public function update(array $data, $id);
    public function destroy($ids);
    public function getImage($id);
}
