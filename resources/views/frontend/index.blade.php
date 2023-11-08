@extends('layouts.website')
@section('title', 'Blog Website | Develop by Muktar Hussain')

@section('content')
<div class="site-section bg-light">
    <div class="container">
        <div class="row align-items-stretch retro-layout-2">
            <div class="col-md-4">
                @foreach($firstPost as $fPost)
                <a href="{{url('/post/'. $fPost->slug)}}" class="h-entry mb-30 v-height gradient"
                    style="background-image: url('{{$fPost->image}}');">

                    <div class="text">
                        <h2>{{$fPost->title}}</h2>
                        <span class="date">{{$fPost->created_at->format('d M, Y')}}</span>
                    </div>
                </a>
                @endforeach
            </div>
            <div class="col-md-4">
                @foreach($middlePost as $mPost)
                <a href="{{url('/post/'. $mPost->slug)}}" class="h-entry img-5 h-100 gradient"
                    style="background-image: url('{{$fPost->image}}');">
                    <div class="text">
                        <div class="post-categories mb-1">
                        @foreach($mPost->categories as $category)
                        <span class="d-inline-block bg-info mb-1 px-2 p-1 mr-1 rounded">{{$category->name}}</span>
                        @endforeach
                        </div>
                        <h2>{{$mPost->title}}</h2>
                        <span class="date">{{$mPost->created_at->format('d M, Y')}}</span>
                    </div>
                </a>
                @endforeach
            </div>
            <div class="col-md-4">
                @foreach($lastPost as $lPost)
                <a href="{{url('/post/'. $fPost->slug)}}" class="h-entry mb-30 v-height gradient"
                    style="background-image: url('{{$lPost->image}}');">

                    <div class="text">
                        <h2>{{$lPost->title}}</h2>
                        <span class="date">{{$lPost->created_at->format('d M, Y')}}</span>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row mb-3">
            <div class="col-12">
                <h2>Recent Posts</h2>
            </div>
        </div>
        <div class="row">
            @foreach($recentPosts as $recentPost)
            <div class="col-lg-4 mb-4">
                <div class="entry2">
                    <a href="{{url('/post/'. $recentPost->slug)}}"><img src="{{asset($recentPost->image)}}" alt="Image"
                            class="img-fluid rounded"></a>
                    <div class="excerpt">
                        @foreach($recentPost->categories as $category)
                        <span class="d-inline-block bg-info mb-1 p-1 px-2 mr-1 rounded text-white">{{$category->name}}</span>
                        @endforeach

                        <h2><a href="{{url('/post/'. $recentPost->slug)}}">{{$recentPost->title}}</a></h2>
                        <div class="post-meta align-items-center text-left clearfix mb-2">
                            <figure class="author-figure mb-0 mr-3 float-left"><img
                                    src="@if($recentPost->user->image){{asset($recentPost->user->image)}} @else{{asset('public/media/user.png')}}@endif"
                                    alt="Image" class="img-fluid">
                            </figure>
                            <span class="d-inline-block mt-1">By <a
                                    href="{{url('author', $recentPost->user_id)}}">{{$recentPost->user->name}}</a></span>
                            <span>&nbsp;-&nbsp; {{date('d M, y', strtotime($recentPost->created_at))}}
                                <!-- {{$recentPost->created_at->format('d M, Y')}} -->
                            </span>
                        </div>
                        <p></p>
                        <p><a href="{{url('/post/'. $recentPost->slug)}}">Read More <i class="far fa-chevron-right"></i> <i class="far fa-angle-right"></i> <i class="far fa-arrow-alt-to-right"></i> <i class="far fa-arrow-alt-square-left"></i></a></p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row text-center pt-5 border-top">
            <div class="col-md-12">
                <div class="pagination">
                {{ $recentPosts->links() }}
                </div>
                <!-- <div class="custom-pagination">
              <span>1</span>
              <a href="#">2</a>
              <a href="#">3</a>
              <a href="#">4</a>
              <span>...</span>
              <a href="#">15</a>
            </div> -->
            </div>
        </div>
    </div>
</div>

<!-- National Category Blog show -->
<div class="site-section bg-light">
    <div class="container">
        <div class="row mb-3">
            <div class="col-12">
                <h2>National</h2>
            </div>
        </div>
        <div class="row">
            @foreach($categoryWise as $post)
            @foreach($post->categories as $category)
            @if($category->name == 'Web Design')
            <div class="col-lg-4 mb-4">
                <div class="entry2">
                    <a href="{{url('/post/'. $post->slug)}}"><img src="{{$post->image}}" alt="Image"
                            class="img-fluid rounded"></a>
                    <div class="excerpt">
                        @foreach($post->categories as $category)
                        <span class="d-inline-block bg-info mb-1 p-1 px-2 mr-1 rounded text-white">{{$category->name}}</span>
                        @endforeach
                        <h2><a href="{{url('/post/'. $post->slug)}}">{{$post->title}}</a></h2>
                        <div class="post-meta align-items-center text-left clearfix mb-2">
                            <figure class="author-figure mb-0 mr-3 float-left"><img
                                    src="@if($post->user->image){{asset($post->user->image)}} @else{{asset('public/media/user.png')}}@endif"
                                    alt="Image" class="img-fluid"></figure>
                            <span class="d-inline-block mt-1">By <a
                                    href="{{url('author', $post->user_id)}}">{{$post->user->name}}</a></span>
                            <span>&nbsp;-&nbsp; {{date('d M, y', strtotime($post->created_at))}}
                                <!-- {{$recentPost->created_at->format('d M, Y')}} -->
                            </span>
                        </div>
                        <p></p>
                        <p><a href="{{url('/post/'. $post->slug)}}">Read More</a></p>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
            @endforeach
        </div>
    </div>
</div>

<!-- International Category Blog show -->
<div class="site-section bg-light">
    <div class="container">
        <div class="row mb-3">
            <div class="col-12">
                <h2>International</h2>
            </div>
        </div>
        <div class="row">
            @foreach($categoryWise as $post)
            @foreach($post->categories as $category)
            @if($category->name == 'Web Design')
            <div class="col-lg-4 mb-4">
                <div class="entry2">
                    <a href="{{url('/post/'. $post->slug)}}"><img src="{{$post->image}}" alt="Image"
                            class="img-fluid rounded"></a>
                    <div class="excerpt">
                        @foreach($post->categories as $category)
                        <span class="d-inline-block bg-info mb-1 p-1 px-2 mr-1 rounded text-white">{{$category->name}}</span>
                        @endforeach
                        <h2><a href="{{url('/post/'. $post->slug)}}">{{$post->title}}</a></h2>
                        <div class="post-meta align-items-center text-left clearfix mb-2">
                            <figure class="author-figure mb-0 mr-3 float-left"><img
                                    src="@if($post->user->image){{asset($post->user->image)}} @else{{asset('public/media/user.png')}}@endif"
                                    alt="Image" class="img-fluid"></figure>
                            <span class="d-inline-block mt-1">By <a
                                    href="{{url('author', $post->user_id)}}">{{$post->user->name}}</a></span>
                            <span>&nbsp;-&nbsp; {{date('d M, y', strtotime($post->created_at))}}
                                <!-- {{$recentPost->created_at->format('d M, Y')}} -->
                            </span>
                        </div>
                        <p></p>
                        <p><a href="{{url('/post/'. $post->slug)}}">Read More</a></p>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
            @endforeach
        </div>
    </div>
</div>

<!-- Economics Category Blog show -->
<div class="site-section bg-light">
    <div class="container">
        <div class="row mb-3">
            <div class="col-12">
                <h2>National</h2>
            </div>
        </div>
        <div class="row">
            @foreach($categoryWise as $post)
            @foreach($post->categories as $category)
            @if($category->name == 'Web Design')
            <div class="col-lg-4 mb-4">
                <div class="entry2">
                    <a href="{{url('/post/'. $post->slug)}}"><img src="{{$post->image}}" alt="Image"
                            class="img-fluid rounded"></a>
                    <div class="excerpt">
                        @foreach($post->categories as $category)
                        <span class="d-inline-block bg-info mb-1 p-1 px-2 mr-1 rounded text-white">{{$category->name}}</span>
                        @endforeach
                        <h2><a href="{{url('/post/'. $post->slug)}}">{{$post->title}}</a></h2>
                        <div class="post-meta align-items-center text-left clearfix mb-2">
                            <figure class="author-figure mb-0 mr-3 float-left"><img
                                    src="@if($post->user->image){{asset($post->user->image)}} @else{{asset('public/media/user.png')}}@endif"
                                    alt="Image" class="img-fluid"></figure>
                            <span class="d-inline-block mt-1">By <a
                                    href="{{url('author', $post->user_id)}}">{{$post->user->name}}</a></span>
                            <span>&nbsp;-&nbsp; {{date('d M, y', strtotime($post->created_at))}}
                                <!-- {{$recentPost->created_at->format('d M, Y')}} -->
                            </span>
                        </div>
                        <p></p>
                        <p><a href="{{url('/post/'. $post->slug)}}">Read More</a></p>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
            @endforeach
        </div>
    </div>
</div>


<div class="site-section bg-lightx">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-md-5">
                <div class="subscribe-1 ">
                    <h2>Subscribe to our newsletter</h2>
                    <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit nesciunt error illum a
                        explicabo, ipsam nostrum.</p>
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
