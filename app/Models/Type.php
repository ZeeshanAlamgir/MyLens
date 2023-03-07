<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Type extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'types';
    protected $fillable = [
        'label',
        'image',
        'slug'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class,'product_types');
    }
}
