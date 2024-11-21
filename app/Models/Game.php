<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = ['title','producer','price','description','cover','user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
