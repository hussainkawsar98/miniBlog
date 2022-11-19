<?php

namespace App\Http\Controllers;

use Auth;
use File;
use Image;
use App\Http\Controllers\attach;
use Session;
use App\Models\{Post,Tag,Category,User};
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC')->paginate(20);
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::All();
        $categories = Category::All();
        return view('admin.post.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:posts,title',
            'image' => 'image|nullable|max:500',
            'description' => 'required',
            // 'category_id' => 'required',
        ]);


        // $post = Post::create([
        //     'title' => $request->title,
        //     'slug' => Str::of($request->title)->slug('-'),
        //     'image' => 'image.jpg',
        //     'description' => $request->description,
        //     'category_id' => $request->category_id,
        //     'user_id' => auth()->user()->id,
        //     'tags' => $request->tags,
        // ]);

        $post = new Post();
        $post->title = $request->title;
        $post->slug = Str::of($request->title)->slug('-');
        $post->image = 'public/uploads/image.jpg';
        $post->description = $request->description;
        $post->user_id = auth()->user()->id;
        $post->title = $request->title;
        $post->title = $request->title;

        if($request->hasFile('image')){
            $image = $request->image;
            $image_new_name = $post->slug .'.'.$image->getClientOriginalExtension();
            $image->move('public/uploads/', $image_new_name);
            $post->image = 'public/uploads/' . $image_new_name;
            $post->save();
        }else {
            $post->save();
        }

        $post->categories()->attach($request->category_id);
        $post->tags()->attach($request->tag_id);

        Session::flash('success', 'Post created successfully!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.post.edit', compact('post','categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'title' => "required|unique:posts,title, $post->id",
            'image' => 'image|nullable|max:500',
        ]);

        $post->title = $request->title;
        $post->slug = Str::of($request->title)->slug('-');
        $post->description = $request->description;

        if($request->hasFile('image')){
            if(File::exists($request->old_image)){
                File::delete($request->old_image);
            }
            $image = $request->image;
            $image_new_name = $post->slug .'.'.$image->getClientOriginalExtension();
            $image->move('public/uploads/', $image_new_name);
            $post->image = 'public/uploads/' . $image_new_name;
            $post->save();
        }else{
            $post->save();
        }

        $post->categories()->sync($request->category_id);
        $post->tags()->sync($request->tag_id);

        Session::flash('success', 'Post Updated successfully!');
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Another way
        $post = Post::find($id);
        if(File::exists($post->image)){
            File::delete($post->image);
            $post->delete();
        }else{
            $post->delete();
        }
        $post->categories()->detach();
        $post->tags()->detach();

        Session::flash('success', 'Category Deleted Successfully!');
        return redirect()->route('post.index');




     //__Model__//
    //  $post = Post::find($id);
    //  if(File::exists($post->image)){
    //      File::delete($post->image);
    //      $post->delete();
    //  }else{
    //      $post->delete();
    //  }

     //Query Builder
     // $post = DB::table('posts')->where('id', $id)->first();
     // if(File::exists($post->image)){
     //         File::delete($post->image);
     //         $post = DB::table('posts')->where('id', $id)->delete();
     //     }else{
     //         $post = DB::table('posts')->where('id', $id)->delete();
     //     }
     
    //  return redirect()->back()->with('success', 'Delete Successfully');


    }
}
