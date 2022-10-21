<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Post,Category,Tag,Setting};

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
        $graphics = Post::with('Category', 'User')->where('category_id', 2)->orderBy('created_at', 'DESC')->take(20)->get();
        return view('frontend.index', compact('recentPosts', 'firstPost', 'middlePost', 'lastPost', 'national', 'graphics'));
    }

    //__About Page__//
    public function about()
    {
        return view('frontend.about');
    }

    //__Contact Page__//
    public function contact()
    {
        $setting = Setting::first();
        return view('frontend.contact', compact('setting'));
    }

    //__Post Page__//
    public function post($slug)
    {   
        $post = Post::with('Category', 'User')->where('slug', $slug)->first();
        $posts = Post::with('category', 'User')->inRandomOrder()->limit(4)->get();
        // $categories = Category::with('posts')>get();
        $categories = Category::all();
        $tags = Tag::all();
        if($post){
            return view('frontend.post', compact('post', 'posts', 'categories', 'tags'));
  
        }else{
            return redirect('/');
        }  
    }

    //__Category Page__//
    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();
        if($category){
            $posts = Post::where('category_id', $category->id)->orderBy('created_at', 'DESC')->paginate(3);
            return view('frontend.category', compact('category', 'posts'));
        }else{
            return redirect('/');
        }
    }

    //__Tag Page__//
    public function tag()
    {
        return view('frontend.tag');
    }
}
