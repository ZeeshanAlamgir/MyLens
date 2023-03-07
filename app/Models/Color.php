<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Color extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'colors';
    protected $fillable = [
        'name',
        'banner',
        'image',
        'slug'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class,'product_colors');
    }
}
