<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'products';
    protected $fillable = [
        'name',
        'image',
        'description',
        'collection_id',
        'replacement_cycle_id',
        'tone_id',
        'style_id',
        'slug',
        'lens_material',
        'base_curve',
        'diameter',
        'oxygen_permeability',
        'center_thickness',
        'power',
        'before_image',
        'after_image',
        'before_after_description',
        'buy_product_online_link'
    ];

    public function colors()
    {
        return $this->belongsToMany(Color::class,'product_colors');
    }

    public function types()
    {
        return $this->belongsToMany(Type::class,'product_types');
    }

    public function gallery()
    {
        return $this->hasMany(ProductGallery::class);
    }

    public function collection()
    {
        return $this->belongsTo(Collection::class,'collection_id','id');
    }

    public function replacement_cycle()
    {
        return $this->belongsTo(ReplacementCycle::class,'replacement_cycle_id','id');
    }

    public function style()
    {
        return $this->belongsTo(Style::class,'style_id','id');
    }

    public function tone()
    {
        return $this->belongsTo(Tone::class,'tone_id','id');
    }
}
