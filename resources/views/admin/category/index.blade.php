@extends('layouts.admin')
@section('title', 'All Category | Develop by Muktar Hussain')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Category</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
                        <li class="breadcrumb-item active">Category List</li>
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
                    <h3 class="card-title pt-2">Category List</h3>
                    <a href="{{route('category.create')}}" class="btn btn-primary">Add Category</a>
               </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Slug</th>
                      <th>Count</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($categories->count())
                    @foreach($categories as $category)
                    <tr>
                      <td>{{$category->name}}</td>
                      <td>{{$category->slug}}</td>
                      <td>{{$category->posts->count()}}</td>
                      <td class="d-flex">
                        <a href="{{route('category.edit', $category->id)}}" class="btn btn-sm btn-primary mr-1"><i class="fas fa-edit"></i></a>
                        <form action="{{route('category.destroy', $category->id)}}" class="d-inline" method="POST">
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
                      <td colspan="4">
                        <h5 class="text-center text-danger">No Categories Found.</h5>
                      </td>
                    </tr>
                    @endif
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="ml-auto my-3 mr-4">
                {{$categories->links()}}
              </div>
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