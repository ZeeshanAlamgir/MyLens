<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Phone extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'phones';
    protected $fillable = [
        'phone_no',
        'city_id'
    ];

    public function cities()
    {
        return $this->belongsTo(City::class,'city_id','id');
    }

}
