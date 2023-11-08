@extends('layouts.admin')
@section('title', 'View Comment | Develop by Muktar Hussain')

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
                                    <h3 class="card-title pt-2">Comment Show</h3>
                                    <a href="{{route('comment.index')}}" class="btn btn-primary">Go Back Comment List</a>
                                </div>
                            </div>
                            <div class="card-body p-4">
                                <table class="table table-striped table-bordered">
                                    <tbody>
                                        <tr>
                                            <th style="vertical-align:top;">User Name</th>
                                            <td>{{$comment->name}}</td>
                                        </tr>
                                        <tr>
                                            <th style="vertical-align:top;">Email</th>
                                            <td>{{$comment->email}}</td>
                                        </tr>
                                        <tr>
                                            <th style="vertical-align:top;">Comment</th>
                                            <td>{{$comment->comment}}</td>
                                        </tr>
                                        <tr>
                                            <th style="vertical-align:top;">Post Name</th>
                                            <td>{{$comment->post->title}}</td>
                                        </tr>
                                        <tr>
                                            <th style="vertical-align:top;">Time</th>
                                            <td>{{$comment->created_at->format('H:i a. - d M, Y', '11.19.2022 12:00:00 AM.')}}</td>
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