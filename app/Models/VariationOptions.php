<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VariationOptions extends Model
{
    use HasFactory;

    protected $table = 'variation_options';
    protected $fillable = ['variation_id', 'option_name', 'status'];

    public function getVariation()
    {
        return $this->belongsTo(Variations::class, 'variation_id');
    }
}
