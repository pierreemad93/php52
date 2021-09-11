<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory; 
    protected $fillable = [
        'title' , 'desc' , 'image' , 'author' , 'user_id'  
    ]; 

    public function comments(){
        return $this->hasMany(PostComment::class , 'post_id' , 'id');
    }
}
