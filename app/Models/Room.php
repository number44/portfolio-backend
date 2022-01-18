<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $guarded = ['id'];    
    public function location(){
        return $this->belongsTo(Location::class);
    }
    public function roomtype(){
        return $this->belongsTo(Roomtype::class);
    }
    public function district(){
        return $this->belongsTo(District::class);
    }

    public function pictures(){
        return $this->hasMany(Picture::class);
    }
}
