<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShippingServices extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'shipping_services';
    protected $fillable = ['country_id', 'company_name', 'description', 'delivery_time', 'status'];

    public function getCountry()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
}
