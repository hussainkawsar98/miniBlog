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
    public function category(){
        return $this->belongsTo('App\Models\Category', 'category_id'); //Category ID
    }

    //__Join with Usery__//
    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');  //User ID
    }

     //__Join with Usery__//
     public function tag(){
        return $this->belongsToMany('App\Models\Tag');  //User ID
    }
}
