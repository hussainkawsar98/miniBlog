<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class FrontendController extends Controller
{
    //__Home Page__//
    public function home()
    {
        $posts = Post::with('Category', 'User')->orderBy('created_at', 'DESC')->take(5)->get();
        $firstPost = $posts->splice(0, 2);
        $middlePost = $posts->splice(0, 1);
        $lastPost = $posts->splice(0, 2);

        $recentPosts = Post::with('Category', 'User')->orderBy('created_at', 'DESC')->paginate(6);
        $national = Post::with('Category', 'User')->orderBy('created_at', 'DESC')->take(3)->get();
        $international = Post::with('Category', 'User')->orderBy('created_at', 'DESC')->take(3)->get();

        return view('frontend.index', compact('recentPosts', 'firstPost', 'middlePost', 'lastPost', 'national', 'international'));
    }

    //__Home Page__//
    public function about()
    {
        return view('frontend.about');
    }

    //__Home Page__//
    public function contact()
    {
        return view('frontend.contact');
    }

    //__Home Page__//
    public function post($slug)
    {   
        $post = Post::with('Category', 'User')->where('slug', $slug)->first();
        if($post){
            return view('frontend.post', compact('post'));
        }else{
            return redirect('/');
        }  
    }

    //__Home Page__//
    public function category()
    {
        return view('frontend.category');
    }
}
