<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceVariationOptions extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'price_variation_options';
    protected $fillable = ['variation_id', 'option_name', 'status'];

    public function getPriceVariation()
    {
        return $this->belongsTo(PriceVariations::class, 'variation_id');
    }
}
