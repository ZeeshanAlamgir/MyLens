<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'cities';
    protected $fillable = [
        'name',
        'distributor_id'
    ];

    public function distributor()
    {
        return $this->belongsTo(Distributor::class,'distributor_id','id');
    }

    public function phones()
    {
        return $this->hasMany(Phone::class);
    }
}
