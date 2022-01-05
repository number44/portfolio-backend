<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Placetype extends Model
{
    use HasFactory;
 public function place(){
            return $this->hasMany(Place::class);
    }    
}
