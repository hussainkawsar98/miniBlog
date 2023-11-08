@extends('layouts.website')
@section('title', 'View Post Single | Develop by Muktar Hussain')

@section('content')
<div class="site-cover site-cover-sm same-height overlay single-page" style="background-image: url('{{asset($post->image)}}');">
      <div class="container">
        <div class="row same-height justify-content-center">
          <div class="col-md-12 col-lg-10">
            <div class="post-entry text-center">
                @foreach($post->categories as $category)
                <span class="post-category text-white bg-primary mb-3">{{$category->name}}</span>
                @endforeach
              <h1 class="mb-4"><a href="javascript:void()">{{$post->title}}</a></h1>
              <div class="post-meta align-items-center text-center">
                <figure class="author-figure mb-0 mr-3 d-inline-block"><img src="@if($post->user->image){{asset($post->user->image)}} @else{{asset('public/media/user.png')}}@endif" alt="Image" class="img-fluid"></figure>
                <span class="d-inline-block mt-1">By {{$post->user->name}}</span>
                <span>&nbsp;-&nbsp; {{$post->created_at->format('d M, Y')}}</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <section class="site-section py-lg">
      <div class="container">
        
        <div class="row blog-entries element-animate">

          <div class="col-md-12 col-lg-8 main-content">
            
            <div class="post-content-body">
              {!! $post->description !!}
            </div>

            
            <div class="pt-3">
              <p>
                Categories: 
                @foreach($post->categories as $category)
                <a href="#"><span class="post-category text-primary bg-white mb-3">{{$category->name}}</span></a>
                @endforeach
                <br>
                Tags:
                @foreach($post->tags as $tag)
                <a href="#"><span class="post-category text-primary bg-light mb-3">{{$tag->tag}}</span></a>
                @endforeach
              </p>
            </div>

            <div class="pt-3">
              <ul class="comment-list">
                <h3>Comments</h3>
                @foreach($post->comments as $comment)
                @if($comment)
                <li class="comment ml-4 mb-3">
                  <h5>{{$comment->name}}</h5>
                  <div class="meta">{{$comment->created_at->format('H:i a. - d M, Y', '11.19.2022 12:00:00 AM.')}}</div>
                  <p>{{$comment->comment}}</p>
                </li>
                @endif
                @endforeach
              </ul>
            
              <!-- END comment-list -->
              
              <div class="comment-form-wrap pt-3">
                <h3 class="mb-3">Leave a comment</h3>
                <form action="{{route('comment.store')}}" method="POST" class="p-5 bg-light">
                <ul class="ul-error p-0">
                  @foreach ($errors->all() as $error)
                    <li class="text-danger list-unstyled">{{ $error }}</li>
                  @endforeach
                </ul>
                  @csrf
                  <input type="number" name="post_id" class="d-none" value="{{$post->id}}">
                  <div class="form-group">
                    <label for="name">Name *</label>
                    <input type="text" class="form-control" name="name" id="name">
                  </div>
                  <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" class="form-control" name="email" id="email">
                  </div>
                  <div class="form-group">
                    <label for="message">Comment</label>
                    <textarea name="" id="message" cols="30" name="comment" rows="5" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <input type="submit" value="Post Comment" class="btn btn-primary">
                  </div>
                  @if(Session::has('success'))
                  <p class="alert bg-success text-white">{{ Session::get('success') }}</p>
                  @endif
                </form>
              </div>
            </div>

          </div>

          <!-- END main-content -->

          <div class="col-md-12 col-lg-4 sidebar">
            <div class="sidebar-box search-form-wrap">
              <form action="#" class="search-form">
                <div class="form-group">
                  <span class="icon fa fa-search"></span>
                  <input type="text" class="form-control" id="s" placeholder="Type a keyword and hit enter">
                </div>
              </form>
            </div>
            <!-- Start sidebar-box -->  
            <div class="sidebar-box">
              <h3 class="heading">Popular Posts</h3>
              <div class="post-entry-sidebar">
                <ul>
                  @foreach($posts as $post)
                  <li>
                    <a href="{{route('post', $post->slug)}}">
                      <img src="{{asset($post->image)}}" alt="Image placeholder" class="mr-4">
                      <div class="text">
                        <h4>{{$post->title}}</h4>
                        <div class="post-meta">
                        <span class="mr-2">{{$post->created_at->format('d M, Y')}}</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  @endforeach
                </ul>
              </div>
            </div>
            <!-- END sidebar-box -->

            <div class="sidebar-box">
              <h3 class="heading">Categories</h3>
              <ul class="categories">
                @foreach($categories as $category)
                <li><a href="{{route('category', $category->slug)}}">{{$category->name}} <span>({{$category->posts->count()}})</span></a></li>
                @endforeach
              </ul>
            </div>
            <!-- END sidebar-box -->

            <div class="sidebar-box">
              <h3 class="heading">Tags</h3>
              <ul class="tags">
                @foreach($tags as $tag)
                <li><a href="{{route('tag', $tag->slug)}}">{{$tag->tag}}</a></li>
                @endforeach
              </ul>
            </div>
          </div>
          <!-- END sidebar -->

        </div>
      </div>
    </section>

    <div class="site-section bg-light">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12">
            <h2>More Related Posts</h2>
          </div>
        </div>

        <div class="row">
        @foreach($recentPost as $rePost)
          <div class="col-lg-4 mb-4">
              <div class="entry2">
                  <a href="{{url('/post/'. $post->slug)}}"><img src="{{asset($post->image)}}" alt="Image"
                    class="img-fluid rounded"></a>
                  <div class="excerpt">
                      @foreach($rePost->categories as $category)
                      <span class="d-inline-block bg-info mb-1 p-1 px-2 mr-1 rounded text-white">{{$category->name}}</span>
                      @endforeach
                      <h2><a href="{{url('/post/'. $post->slug)}}">{{$rePost->title}}</a></h2>
                      <div class="post-meta align-items-center text-left clearfix mb-2">
                          <figure class="author-figure mb-0 mr-3 float-left"><img
                                  src="@if($post->user->image){{asset($post->user->image)}} @else{{asset('public/media/user.png')}}@endif"
                                  alt="Image" class="img-fluid"></figure>
                          <span class="d-inline-block mt-1">By <a
                                  href="{{url('author', $post->user_id)}}">{{$rePost->user->name}}</a></span>
                          <span>&nbsp;-&nbsp; {{date('d M, y', strtotime($rePost->created_at))}}
                          </span>
                      </div>
                      <p></p>
                      <p><a href="{{url('/post/'. $post->slug)}}">Read More</a></p>
                  </div>
                </div>
            </div>
            @endforeach
          </div>
            
          </div>
        </div>

      </div>
    </div>


    <div class="site-section bg-lightx">
      <div class="container">
        <div class="row justify-content-center text-center">
          <div class="col-md-5">
            <div class="subscribe-1 ">
              <h2>Subscribe to our newsletter</h2>
              <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit nesciunt error illum a explicabo, ipsam nostrum.</p>
              <form action="#" class="d-flex">
                <input type="text" class="form-control" placeholder="Enter your email address">
                <input type="submit" class="btn btn-primary" value="Subscribe">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endsection
  
  

    

    
    