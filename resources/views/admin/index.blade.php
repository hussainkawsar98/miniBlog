@extends('layouts.admin')
@section('title', 'Blog Website Dashboard | Develop by Muktar Hussain')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
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
      <div class="col-lg-3 col-6">

      <div class="small-box bg-info">
      <div class="inner">
      <h3>{{$post->count()}}</h3>
      <p>Total Post</p>
      </div>
      <div class="icon">
      <i class="nav-icon fas fa-tachometer-alt"></i>
      </div>
      <a href="{{route('post.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
      </div>

      <div class="col-lg-3 col-6">

      <div class="small-box bg-success">
      <div class="inner">
      <h3>{{$category->count()}}</h3>
      <p>Total Category</p>
      </div>
      <div class="icon">
      <i class="nav-icon far fa-file-alt"></i>
      </div>
      <a href="{{route('category.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
      </div>

      <div class="col-lg-3 col-6">

      <div class="small-box bg-warning">
      <div class="inner">
      <h3>{{$tag->count()}}</h3>
      <p>All Tag</p>
      </div>
      <div class="icon">
      <i class="fas fa-tags nav-icon"></i>
      </div>
      <a href="{{route('tag.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
      </div>

      <div class="col-lg-3 col-6">
        <div class="small-box bg-secondary">
          <div class="inner">
            <h3>{{$comment->count()}}</h3>
            <p>All Comment</p>
          </div>
          <div class="icon">
            <i class="far fa-comments nav-icon"></i>
          </div>
          <a href="{{route('comment.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>{{$message->count()}}</h3>
            <p>All Message</p>
          </div>
          <div class="icon">
          <i class="nav-icon far fa-envelope"></i>
          </div>
          <a href="{{route('message.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-6">
        <div class="small-box bg-primary">
          <div class="inner">
            <h3>{{$user->count()}}</h3>
            <p>All User</p>
          </div>
          <div class="icon">
            <i class="far fa-user nav-icon"></i>
          </div>
          <a href="{{route('user.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection