<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'countries';
    protected $fillable = ['name', 'status'];

    public function getStores()
    {
        return $this->hasMany('App\Models\Store', 'country_id', 'id');
    }
}
