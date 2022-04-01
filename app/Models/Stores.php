<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stores extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'stores';
    protected $fillable = ['country_id', 'name', 'login', 'password', 'phone', 'related_person', 'email', 'social' ,'address', 'bg_image', 'logo', 'video_link', 'description', 'who_manage','status'];

    public function getCountry()
    {
        return $this->belongsTo('App\Models\Country', 'country_id', 'id');
    }
    public function getCards()
    {
        return $this->hasMany('App\Models\PaymentCards', 'store_id','id');
    }

}
