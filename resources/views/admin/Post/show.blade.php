@extends('layouts.admin')
@section('title', 'View Post | Develop by Muktar Hussain')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add Post</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('post.index')}}">Post List</a></li>
                        <li class="breadcrumb-item active">Show Post</li>
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
                    <div class="col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title pt-2">Create Post</h3>
                                    <a href="{{route('post.index')}}" class="btn btn-primary">Go Back Post List</a>
                                </div>
                            </div>
                            <div class="card-body p-4">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 160px; vertical-align:top;">Image</th>
                                            <th><img src="{{asset($post->image)}}" width="300px" alt=""></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th style="vertical-align:top;">Title</th>
                                            <td>{{$post->title}}</td>
                                        </tr>
                                        <tr>
                                            <th>Category Name</th>
                                            <td>
                                                @foreach($post->categories as $category)
                                                {{$category->name}}; &nbsp;
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <th style="vertical-align:top;">Post Tags</th>
                                            <td> @foreach($post->tags as $tag)
                                                {{$tag->tag}}; &nbsp;
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Author Name</th>
                                            <td>{{$post->user->name}}</td>
                                        </tr>
                                        <tr>
                                            <th style="vertical-align:top;">Description</th>
                                            <td>{!! $post->description !!}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <!-- /.content-wrapper -->
@endsection