<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Post,Category,Tag,Contact,User,Comment};
class BackendController extends Controller
{
    public function index(){
        $post = Post::all();
        $category = Category::all();
        $tag = Tag::all();
        $comment = Comment::all();
        $message = Contact::all();
        $user = User::all();
        return view('admin.index', compact('post','category','tag','comment','message','user')); 
    }
}
