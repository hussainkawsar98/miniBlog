@extends('layouts.website')
@section('title', 'Tag View | Develop by Muktar Hussain')

@section('content')
<div class="py-5 bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
              <span>Category</span>
              <h3>{{$category->name}}</h3>
              <p>{{$category->description}}</p>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section bg-white">
      <div class="container">
        <div class="row">
          @foreach($posts as $post)
          <div class="col-lg-4 mb-4">
            <div class="entry2">
              <a href="single.html"><img src="{{asset($post->image)}}" alt="Image" class="img-fluid rounded"></a>
              <div class="excerpt">
              <h2><a href="{{route('post', $post->slug)}}">{{$post->title}}</a></h2>
              <div class="post-meta align-items-center text-left clearfix">
                <figure class="author-figure mb-0 mr-3 float-left"><img src="@if($post->user->image){{asset($post->user->image)}} @else{{asset('public/media/user.png')}}@endif" alt="Image" class="img-fluid"></figure>
                <span class="d-inline-block mt-1">By <a href="#">{{$post->user->name}}</a></span>
                <span>&nbsp;-&nbsp; {{date('d M, y', strtotime($post->created_at))}}</span>
              </div>
              
                <p>{{$post->description}}</p>
                <p><a href="{{route('post', $post->slug)}}">Read More</a></p>
              </div>
            </div>
          </div>
          @endforeach
          
        </div>
        <div class="row text-center pt-5 border-top">
          <div class="col-md-12">
            <div class="pagination">
              {{$posts->links()}}
            </div>
          </div>
      </div>
    </div>
  </div>
  @endsection
    