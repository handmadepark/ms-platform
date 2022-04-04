<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'categories';
    protected $fillable = ['name', 'category_variations','status'];

}
