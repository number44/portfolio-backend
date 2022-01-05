<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
   protected $fillable = ['name','ename','lat','lon' ,"placetype_id"];
    use HasFactory;
     public function placetype(){
        return $this->belongsTo(Placetype::class);
    }
}
