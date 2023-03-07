<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'stores';
    protected $fillable = [
        'name',
        'address',
        'latitude',
        'longitude',
        'order',
        'city_id'
    ];

    public function store_cities()
    {
        return $this->belongsTo(StoreCity::class,'city_id','id');
    }
}
