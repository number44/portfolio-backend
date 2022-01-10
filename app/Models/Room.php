<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable = ['name','ename' , "price","availability" , "location_id" , 'roomtype_id' ];
    
    public function location(){
            return $this->belongsTo(Location::class);
    }
    public function roomtype(){
        return $this->belongsTo(Roomtype::class);
    }

}
