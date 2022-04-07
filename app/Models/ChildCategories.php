<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ChildCategories extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'child_categories';
    protected $fillable = ['subcat_id', 'name', 'status'];

    public function getSubCategory()
    {
        return $this->belongsTo(SubCategories::class, 'subcat_id');
    }

    public function getGrandChildCategory()
    {
        return $this->hasMany(GrandChildCategories::class, 'child_id');
    }
}
