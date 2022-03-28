<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'logs';
    protected $fillable = ['admin_id','content','status'];

    public function getAdmin()
    {
        return $this->belongsTo('App\Models\Admin', 'admin_id', 'id');
    }
}
