@extends('layouts.admin')
@section('title', 'Setting | Develop by Muktar Hussain')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Setting</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
                        <li class="breadcrumb-item active">Setting</li>
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
                    @foreach($setting as $set)
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title pt-2">Website Setting</h3>
                                <a href="{{route('setting.edit', $set->id)}}" class="btn btn-primary">Edit Setting</a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="card-primary">
                                <div class="card-body">
                                    <div class="row mb-4">
                                        <div class="col-md-12">
                                            <h5>Footer Title</h5>
                                            <p>{{$set->site_title}}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <h5>WebSite Logo</h5>
                                            <img src="{{asset($set->site_logo)}}" alt="" width="300px">
                                        </div>
                                        <div class="col-md-6">
                                            <h5>Fotter Logo</h5>
                                            <img src="{{asset($set->footer_logo)}}" alt="" width="250px">
                                        </div>
                                    </div>
                                    <h5>Footer Description</h5>
                                    <p>{{$set->footer_des}}</p>

                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            <h5>FaceBook Link</h5>
                                            <p>{{$set->facebook}}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <h5>Instagram Link</h5>
                                            <p>{{$set->instagram}}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <h5>Twitter Link</h5>
                                            <p>{{$set->twitter}}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <h5>LinkedIn Link</h5>
                                            <p>{{$set->linkedin}}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <h5>Pinterest Link</h5>
                                            <p>{{$set->pinterest}}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <h5>Youtube Link</h5>
                                            <p>{{$set->youtube}}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <h5>Address</h5>
                                            <p>{{$set->address}}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <h5>Phone</h5>
                                            <p>{{$set->phone}}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <h5>Email</h5>
                                            <p>{{$set->email}}</p>
                                        </div>
                                    </div>          
                                    <h5>Copy Right</h5>
                                    <p>{{$set->copy_right}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.content-wrapper -->
@endsection