@extends('layouts.website')
@section('title', 'View Search Result | Develop by Muktar Hussain')

@section('content')
<div class="container-fluid bg-light">
    <div class="container">
        <div class="row py-5">
            <h3>View Search Result</h3>
        </div>
    </div>
</div>

<!-- Search Result Show -->
<div class="container my-5">
  <div class="row">
    @if($posts)
    <h4 class="mb-4">View 10 results</h4>
    @foreach($posts as $post)
    <article class="search-single d-flex mb-4 pb-4">
    <div class="searchImg">
      <img src="{{asset($post->image)}}" alt="" class="img-fluid rounded">
    </div>
    <div class="search-content pl-4">
      <h4>{{$post->title}}</h4>
      <h5 class="d-inline">Category:</h5>
      @foreach($post->categories as $category)
        <span class="d-inline-block bg-info mb-1 mx-1 px-2  rounded text-white">{{$category->name}}</span>
      @endforeach
      <br>
      <span class="d-inline-block mt-1">By <a
              href="{{url('author', $post->user_id)}}">{{$post->user->name}}</a></span>
      <span>&nbsp;-&nbsp; {{date('d M, y', strtotime($post->created_at))}}
    </div>
    </article>
    @endforeach
  </div>
  @else
  <h3>Search not match.</h3>
  @endif
</div>
@endsection
  
  

    

    
    