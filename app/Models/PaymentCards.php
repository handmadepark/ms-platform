<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentCards extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'payment_cards';
    protected $fillable = ['store_id', 'name_on_card', 'card_number', 'expiration_month', 'expiration_year', 'cvc', 'main', 'status'];

    public function getStore()
    {
        return $this->belongsTo(Stores::class, 'store_id', 'id');
    }
}
