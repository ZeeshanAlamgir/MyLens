<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Collection extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'collections';
    protected $fillable = [
        'name',
        'description',
        'banner',
        'image',
        'slug'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
