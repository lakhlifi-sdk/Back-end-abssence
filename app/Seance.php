<?php

namespace App;
use App\User;
use App\Seance;

use Illuminate\Database\Eloquent\Model;

class Seance extends Model
{
   public function absence(){
        return $this->belongsTo(User::class);
    }
  
    public function users(){
        return $this->hasMany(Seance::class);
    }
}
