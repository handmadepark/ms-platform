<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SizeOptions extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'size_options';
    protected $fillable = ['size_id', 'country_id','size_option_name', 'status'];

    public function getSize()
    {
        return $this->belongsTo(Size::class, 'size_id');
    }
}
