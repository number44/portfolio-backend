<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roomtype extends Model
{
    protected $fillable = [ 'name', 'ename'  ];
    use HasFactory;
    public function rooms(){
        return $this->hasMany(Room::class);
    }
}
