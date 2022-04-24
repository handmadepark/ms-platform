<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VariationOptions extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'variation_options';
    protected $fillable = ['variation_id', 'option_name', 'status'];

    public function getVariation()
    {
        return $this->belongsTo(Variations::class, 'variation_id');
    }
}
