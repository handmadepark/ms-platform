<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Variations extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'variations';
    protected $fillable = ['category_id', 'variation_name', 'status'];

    public function getVariationOptions()
    {
        return $this->hasMany(VariationOptions::class, 'variation_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Categories::class, 'category_variations');
    }
}
