<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'products';
    protected $fillable = ['store_id', 'category_id', 'name', 'description', 'attributes', 'selling_price', 'discount', 'stock', 'images', 'rating', 'seen','status'];
}
