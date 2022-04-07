<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategories extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'subcategories';
    protected $fillable = ['parent_id', 'name', 'status'];

    public function getParentCategory()
    {
        return $this->belongsTo(Categories::class, 'parent_id');
    }

    public function getChildCategory()
    {
        return $this->hasMany(ChildCategories::class, 'subcat_id');
    }
}
