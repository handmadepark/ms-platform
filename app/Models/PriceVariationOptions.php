<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PriceVariationOptions extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'price_variation_options';
    protected $fillable = ['pvariation_id', 'option_name', 'status'];

    public function getPriceVariation()
    {
        return $this->belongsTo(PriceVariations::class, 'pvariation_id');
    }
}
