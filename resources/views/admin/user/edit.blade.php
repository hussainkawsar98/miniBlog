@extends('layouts.admin')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">New User</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('user.index')}}">User List</a></li>
                        <li class="breadcrumb-item active">Update User</li>
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
                    <div class="col-md-12 col-lg-9">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title pt-2">Update User</h3>
                                    <a href="{{route('user.index')}}" class="btn btn-primary">Go Back User List</a>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="card-primary">
                                    <!-- Errors List Show -->
                                    @include('layouts.errors')
                                    <form action="{{route('user.update', $user->id)}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value="PUT">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">User Name</label>
                                                <input type="text" value="{{$user->name}}" class="form-control" id="name" name="name">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email Address</label>
                                                <input type="email" value="{{$user->email}}" class="form-control" id="email" name="email">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Phone</label>
                                                <input type="number" value="{{$user->phone}}" class="form-control" id="phone" name="phone">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Password</label>
                                                <input type="password" class="form-control" id="password" name="password">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Short Description</label>
                                                <textarea name="description" id="" value="{{$user->description}}" cols="30" rows="4" class="form-control" placeholder="Write Short Description"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Post Feature Image</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" value="{{ old('image') }}" name="image" id="image">
                                                    <label class="custom-file-label" for="image">Choose Feature Image</label>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Update User</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <!-- /.content-wrapper -->
@endsection