<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['created_at', 'deleted_at', 'updated_at'];

    protected $fillable = [
        'name',
        'slug'
    ];

    //__Join with Post__//
    public function posts(){
        return $this->belongsToMany('App\Models\Post', 'category_posts')->withTimestamps(); 
    }
}
