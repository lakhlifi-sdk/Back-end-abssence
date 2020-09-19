<?php

namespace App;
use App\User;
use App\Seance;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    public function absences(){
        return $this->hasMany(User::class);
    }
  
    public function users(){
        return $this->hasMany(Seance::class);
    }

}
