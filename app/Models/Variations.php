<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Variations extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'variations';
    protected $fillable = [ 'variation_name', 'input_type', 'status'];

    public function getVariationOptions()
    {
        return $this->hasMany(VariationOptions::class, 'variation_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Categories::class, 'category_variations');
    }

    public function getSizes()
    {
        return $this->hasMany(VariationSizes::class, 'variation_sizes');
    }
}
