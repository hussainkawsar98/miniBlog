@extends('layouts.admin')
@section('title', 'All Post | Develop by Muktar Hussain')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Posts</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
                        <li class="breadcrumb-item active">Post List</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

    
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 col-lg-12 pb-4">
          <div class="card mb-4">
              <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h3 class="card-title pt-2">Post List</h3>
                    <a href="{{route('post.create')}}" class="btn btn-primary">Add Post</a>
               </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Title</th>
                      <th>Category</th>
                      <th>Tags</th>
                      <th>Author</th>
                      <th>Image</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($posts->count())
                    @foreach($posts as $post)
                    <tr>
                      <td>{{$post->title}}</td>
                      <td>
                        @foreach($post->categories as $category)
                        <span class="d-inline-block bg-info mb-1 p-1 mr-1 rounded">{{$category->name}}</span>
                        @endforeach
                      </td>
                      <td>
                        @foreach($post->tags as $tag)
                        <span class="d-inline-block bg-info mb-1 p-1 mr-1 rounded">{{$tag->tag}}</span>
                        @endforeach
                      </td>
                      <td>{{$post->user->name}}</td>
                      <td>
                        <div style="max-width:70px; overflow:hidden;">
                        <img src="{{asset($post->image)}}" style="width:100px;" alt="">
                        </div>
                      </td>
                      <td class="d-flex">
                        <a href="{{route('post.edit', $post->id)}}" class="btn btn-sm btn-primary mr-1"><i class="fas fa-edit"></i></a>
                        <a href="{{route('post.show', $post->id)}}" class="btn btn-sm btn-success mr-1"><i class="fas fa-eye"></i></a>
                        <form action="{{route('post.destroy', $post->id)}}" class="d-inline" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
                        @csrf
                        <button type="submit" class="btn btn-sm btn-danger mr-1"><i class="fas fa-trash"></i></button>
                    </form>
                      </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                      <td colspan="6">
                        <h5 class="text-center text-danger">No Posts Found.</h5>
                      </td>
                    </tr>
                    @endif
                  </tbody>
                </table>
              </div>
              <div class="ml-auto my-3 mr-4">
                {{$posts->links()}}
              </div>
              <!-- /.card-body -->
            </div> 
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection