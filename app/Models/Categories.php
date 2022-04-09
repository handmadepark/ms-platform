<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'categories';
    protected $fillable = ['name', 'title', 'description', 'keywords','status'];


    public function getListings()
    {
        return $this->belongsToMany(Listings::class, 'listings_categories');
    }

    public function getSubCategories()
    {
        return $this->hasMany(SubCategories::class, 'parent_id');
    }

}
