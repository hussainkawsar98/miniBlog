<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Post,Category,Tag,Setting,Comment};

class FrontendController extends Controller
{
    //__Home Page__//
    public function home()
    {
        $posts = Post::with('User')->orderBy('created_at', 'DESC')->take(5)->get();
        $firstPost = $posts->splice(0, 2);
        $middlePost = $posts->splice(0, 1);
        $lastPost = $posts->splice(0, 2);

        $recentPosts = Post::with('User')->orderBy('created_at', 'DESC')->paginate(6);
        $categoryWise = Post::with('User')->orderBy('created_at', 'DESC')->take(6)->get();
        return view('frontend.index', compact('recentPosts', 'firstPost', 'middlePost', 'lastPost', 'categoryWise'));
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
        $post = Post::where('slug', $slug)->first();
        $posts = Post::inRandomOrder()->limit(4)->get();
        $recentPost = Post::orderBy('created_at', 'DESC')->take(6)->get();
        // $categories = Category::with('posts')>get();
        $categories = Category::all();
        $tags = Tag::all();
        if($post){
            return view('frontend.post', compact('post', 'posts', 'categories', 'tags', 'recentPost'));
  
        }else{
            return redirect('/');
        }  
    }

    //__Category Page__//
    public function category($slug)
    {   
        $category = Category::where('slug', $slug)->first();
        if($category){
            $posts = Post::with('categories', 'user')->paginate(3);
            return view('frontend.category', compact('category', 'posts'));
        }else{
            return redirect('/');
        }
    }

    //__Tag Page__//
    public function tag()
    {
        $tag = Tag::where('slug', $slug)->first();
        if($tag = Post::where('tag'))
        return view('frontend.tag');
    }

    //__Comment Store//
    public function commentStore()
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
        ]);

        $comment = Comment::create([
            'name' => $request->name,
            'email' => $request->email,
            'comment' => $request->comment,
        ]);
        if($comment){
            return "true";
        }
        dd($comment);
        //return redirect()->route('/')->with('success', 'Comment Have Done.');
        Session::flash('success', 'Post Updated successfully!');
        //return redirect()->route('/');
    }

}
