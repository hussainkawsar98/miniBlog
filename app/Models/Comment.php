<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Comment extends Model
{
    use HasFactory;
    protected $guarded =  ['created_at', 'updated_at']; 

    protected $fillable = [
        'post_id',
        'name',
        'email',
        'comment'
    ];

    //Post Table Connection
    public function post(){
        return $this->belongsTo(Post::class, 'post_id');
    }

    

}
