<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'categories';
    protected $fillable = ['parent_id', 'name', 'title', 'description', 'keywords', 'slug','status'];

    public function subcategory(){
        return $this->hasMany(Categories::class, 'parent_id');
    }
    public function parent()
    {
        return $this->belongsTo(Categories::class, 'parent_id');
    }


    public function variations()
    {
        return $this->belongsToMany(Variations::class, 'category_variations');
    }
    public function getListings()
    {
        return $this->hasMany(Listings::class, 'category_id');
    }

}
