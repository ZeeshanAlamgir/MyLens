<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Certification extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'certifications';
    protected $fillable = [
        'description',
        'image',
    ];
}
