<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PriceVariations extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'price_variations';
    protected $fillable = ['variation_name', 'status'];

    public function getPriceVariationOptions()
    {
        return $this->hasMany(PriceVariationOptions::class, 'variation_id');
    }
}
