<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Listings extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'listings';
    protected $fillable = ['store_id', 'category_id', 'name', 'description', 'attributes', 'selling_price', 'discount', 'stock', 'images', 'rating', 'seen','status'];

    public function getStore()
    {
        return $this->belongsTo(Stores::class, 'store_id', 'id');
    }

    public function getCategories()
    {
        return $this->belongsToMany(Categories::class, 'listings_categories');
    }
}
