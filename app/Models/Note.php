<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = ['name', 'content' , 'slug' ];
    use HasFactory;
    public function category(){
            return $this->belongsTo(Category::class);
    }
    
}
