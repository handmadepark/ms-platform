<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'stores';
    protected $fillable = ['country_id' ,'name', 'email', 'password','status'];

    public function getCountry()
    {
        return $this->belongsTo('App\Models\Country', 'country_id', 'id');
    }
}
