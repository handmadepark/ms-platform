<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mainlands extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'mainlands';
    protected $fillable = ['name', 'status'];

    public function getCountries()
    {
        return $this->hasMany(Stores::class, 'mainland_id', 'id');
    }
}
