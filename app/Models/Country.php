<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'countries';
    protected $fillable = ['mainland_id', 'name', 'status'];

    public function getStores()
    {
        return $this->hasMany(Stores::class, 'country_id', 'id');
    }

    public function getMainland()
    {
        return $this->belongsTo(Mainlands::class, 'mainland_id', 'id');
    }

    public function getShippingServices()
    {
        return $this->hasMany(ShippingServices::class, 'country_id', 'id');
    }
}
