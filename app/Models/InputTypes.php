<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InputTypes extends Model
{
    use HasFactory;

    protected $table = "input_types";
    protected $fillable = ['input_type'];

}
