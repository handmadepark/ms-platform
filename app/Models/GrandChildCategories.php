<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class GrandChildCategories extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'grand_child_categories';
    protected $fillable = ['child_id', 'name', 'status'];

    public function getChildCategory()
    {
        return $this->belongsTo(ChildCategories::class, 'child_id');
    }
}
