<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListingsCategories extends Model
{
    use HasFactory;
    protected $table = 'listings_categories';
    protected $fillable = ['listings_id', 'categories_id'];

}
