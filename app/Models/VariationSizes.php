<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VariationSizes extends Model
{
    use HasFactory;

    protected $table = 'variation_sizes';
    protected $fillable = ['variation_id', 'size_id'];
}
