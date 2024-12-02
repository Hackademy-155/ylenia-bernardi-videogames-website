<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Accessory extends Model
{
    protected $fillable = ['name', 'brand', 'description', 'photo', 'price'];
}
