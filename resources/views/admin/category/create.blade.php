@extends('layouts.admin')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">New Category</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('category.index')}}">Category List</a></li>
                        <li class="breadcrumb-item active">Add Category</li>
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
                                    <h3 class="card-title pt-2">Create Category</h3>
                                    <a href="{{route('category.index')}}" class="btn btn-primary">Go Back Category List</a>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="card-primary">
                                    <!-- Errors List Show -->
                                    @include('layouts.errors')
                                    <form action="{{route('category.store')}}" method="POST">
                                        @csrf
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Category Name</label>
                                                <input type="text" class="form-control" id="name" placeholder="Enter Category" name="name">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Category Description</label>
                                                <textarea name="description" id="description" cols="30" class="form-control" rows="4" placeholder="Category Description"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save Category</button>
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