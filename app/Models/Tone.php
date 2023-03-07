<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tone extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'tones';
    protected $fillable = [
        'label',
        'slug'
    ];
}
