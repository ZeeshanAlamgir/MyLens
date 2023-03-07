<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Distributor extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'distributors';
    protected $fillable = [
        'name',
        'image',
        'email',
        'address',
        'instagram_link',
        'website_link',
        'company'
    ];

    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
