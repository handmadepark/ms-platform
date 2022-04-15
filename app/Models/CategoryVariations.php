<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryVariations extends Model
{
    use HasFactory;

    protected $table = 'category_variations';
    protected $fillable = ['category_id', 'variation_id'];
}
