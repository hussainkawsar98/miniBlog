@extends('layouts.admin')
@section('title', 'User | Develop by Muktar Hussain')

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

        <!-- All User content -->
        @if((Auth()->user())->role > 0)
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12 col-lg-12 pb-4">
              <div class="card mb-4">
                  <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title pt-2">User List</h3>
                        <div class="button">
                          <a href="{{route('user.show', Auth()->user()->id)}}" class="btn btn-info mr-2">View My Profile</a>
                          <a href="{{route('user.create')}}" class="btn btn-primary">Add User</a>
                        </div>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Phone</th>
                          <th>Total Post</th>
                          <th>User Role</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          @if($users->count())
                          @foreach($users as $user)
                          <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->post->count()}}</td>
                            <td>@if($user->role == 1)
                                <span class="right badge badge-success">Admin</span> 
                                @else
                                <span class="right badge badge-info">Editor</span> 
                                @endif
                            </td>
                            <td class="d-flex">
                              <a href="{{route('user.edit', $user->id)}}" class="btn btn-sm btn-primary mr-1"><i class="fas fa-edit"></i></a>
                              <a href="{{route('user.show', $user->id)}}" class="btn btn-sm btn-success mr-1"><i class="fas fa-eye"></i></a>
                              <form action="{{route('user.destroy', $user->id)}}" class="d-inline" method="POST">
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
                              <h5 class="text-center text-danger">Users Not Found.</h5>
                            </td>
                          </tr>
                    @endif
                      </tbody> 
                    </table>
                  </div>
                  <!-- /.card-body -->
                  <div class="ml-auto my-3 mr-4">
                {{$users->links()}}
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

        <!-- Editor content -->
        @else
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
                            <img class="profile-user-img img-fluid img-circle" src="{{asset(Auth::user()->profile)}}" alt="Image" class="img-fluid" width="200px" alt="User profile picture">
                          </div>
                          <h3 class="profile-username text-center">{{Auth()->user()->name}}</h3>
                          @if(Auth()->user()->role > 0)
                          <p class="text-muted text-center"><span class="right badge badge-success">Admin</span></p>
                          @else
                          <p class="text-muted text-center"><span class="right badge badge-info">Editor</span></p>
                          @endif
                          <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                              <b>Email</b> <span class="float-right">{{Auth()->user()->email}}</span>
                            </li>
                            <li class="list-group-item">
                              <b>Phone</b> <span class="float-right">{{Auth()->user()->phone}}</span>
                            </li>
                            <li class="list-group-item">
                              <b>Total Post</b> <span class="float-right">{{Auth()->user()->count()}}</span>
                            </li>
                          </ul>
                          <a href="{{route('user.edit', Auth()->user()->id)}}" class="btn btn-primary btn-block"><b><i class="fas fa-edit"></i> Account Edit</b></a>
                          <form action="{{route('user.destroy', Auth()->user()->id)}}" class="d-inline" method="POST">
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
        @endif
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection