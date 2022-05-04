<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Size extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'sizes';
    protected $fillable = [ 'size_name', 'status'];

    public function getSizeOption()
    {
        return $this->hasMany(SizeOptions::class, 'size_id');
    }

}