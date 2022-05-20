<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryVariations extends Model
{
    use HasFactory;

    protected $table = 'category_variations';
    protected $fillable = ['categories_id', 'variations_id', 'pv'];
}
