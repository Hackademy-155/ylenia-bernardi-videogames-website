<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Console extends Model
{
    protected $fillable = ['name','brand','photo','released','price','logo','description'];

    public function games(){
        return $this->belongsToMany(Game::class);
    }
}
