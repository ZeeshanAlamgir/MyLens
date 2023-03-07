<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryFlag extends Model
{
    use HasFactory;
    public $table = 'country_flags';
    public $fillable = [
        'country_flag'
    ];
}
