<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{Category,User,Tag};

class Post extends Model
{
    use HasFactory;
    protected $guarded =  ['created_at', 'updated_at']; 

    protected $dates = ['published_at'];

    //__Join with Category__//
    // public function categories(){
    //     return $this->belongsToMany('App\Models\Category'); 
    // }
    public function categories(){
        return $this->belongsToMany('App\Models\Category', 'category_posts')->withTimestamps(); 
    }
    //__Join with Usery__//
    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');  //User ID
    }

    //__Join with Usery__//
    public function tags(){
        return $this->belongsToMany('App\Models\Tag'); 
    }
}
