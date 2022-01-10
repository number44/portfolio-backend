<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $fillable = ['name','ename','thumbnail','lon','lat'];
    public function rooms(){
        return $this->hasMany(Room::class);
    }
}
