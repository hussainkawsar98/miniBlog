@extends('layouts.admin')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">User</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
                <li class="breadcrumb-item active">User List</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->       
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12 col-lg-12 pb-4">
              <div class="card mb-4">
                    <h3 class="text-center mt-5">My Profile</h3>
                  <!-- Start Single Profile -->
                  <div class="row">
                    <div class="col-md-5 mx-auto my-4">
                      <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                          <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="@if($user->profile){{asset($user->profile)}} @else{{asset('public/media/user.png')}}@endif" width="200px" alt="Profile picture">
                          </div>
                          <h3 class="profile-username text-center">{{$user->name}}</h3>
                          <p class="text-muted text-center"><span class="right badge badge-info">Editor</span></p>
                          <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                              <b>Email</b> <a class="float-right">{{$user->email}}</a>
                            </li>
                            <li class="list-group-item">
                              <b>Phone</b> <a class="float-right">{{$user->phone}}</a>
                            </li>
                            <li class="list-group-item">
                              <b>Total Post</b> <a class="float-right">2</a>
                            </li>
                            <p class="pt-3">{{$user->phone}}</p>
                          </ul>
                          <a href="{{route('user.edit', $user->id)}}" class="btn btn-primary btn-block"><b><i class="fas fa-edit"></i> Account Edit</b></a>
                          <form action="{{route('user.destroy', $user->id)}}" class="d-inline" method="POST">
                              <input type="hidden" name="_method" value="DELETE">
                              <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
                              @csrf
                              <button type="submit" class="btn btn-danger btn-block mt-2"><i class="fas fa-trash"></i> Delete</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End Single Profile -->
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